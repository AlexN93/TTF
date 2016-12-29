<?php

namespace ApiBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use ApiBundle\Form\ParametersType;
use ApiBundle\Exception\InvalidFormException;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;
use ApiBundle\Mappings\Specialized2;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MappingHandler implements MappingHandlerInterface
{

    private $om;
    private $entityClass;
    private $repository;
    private $formFactory;
    private $container;

    /**
     * Constructor
     *
     * @param ObjectManager         $om
     * @param entityClass           $entityClass
     * @param FormFactoryInterface  $formFactory
     * @param Container             $container
     */
    public function __construct(ObjectManager $om, $entityClass, FormFactoryInterface $formFactory, Container $container)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->container = $container;
    }

    /**
     * Post Parameters, creates a new Parameters object.
     *
     * @api
     *
     * @param Request $parameters
     *
     * @return ParametersInterface
     */
    public function post($request)
    {
        $parameters = json_decode($request->getContent(), true);
        $object = $this->createObject();
        $this->validateInput($object, $parameters);
        $result = $this->calculateXY($parameters);
        $parameters["x"] = $result["x"];
        $parameters["y"] = $result["y"];
        return $this->processForm($object, $parameters, 'POST');
    }

    /**
     * Get all Parameters.
     *
     * @api
     *
     * @return Parameter
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Get a Parameter.
     *
     * @api
     *
     * @param mixed $id
     *
     * @return Parameter
     */
    public function get($id)
    {
        $object = $this->repository->find($id);
        if(!$object) {
            throw new HttpException(404, "No mapping found for given id");
        }
        return $object;
    }

    /**
     * Processes the form.
     *
     * @param $object
     * @param array         $parameters
     * @param String        $method
     *
     * @return ParametersInterface
     *
     * @throws \Acme\BlogBundle\Exception\InvalidFormException
     */
    private function processForm($object, array $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(ParametersType::class, $object, array('method' => $method));
        $form->submit($parameters, 'PATCH' !== $method);
        if ($form->isValid()) {
            $object = $form->getData();
            $this->om->persist($object);
            $this->om->flush($object);
            return $object;
        }
        throw new InvalidFormException('Invalid parameters', $form);

    }

    /**
     * Calculate X/Y
     *
     * @param array         $parameters
     *
     * @return array(
     *             "x" => enum[S,R,T],
     *             "y" => float
     *         )
     *
     * @throws Symfony\Component\HttpKernel\Exception\HttpException
     */
    private function calculateXY(array $parameters)
    {
        $mappings = new Specialized2();
        $rules = $mappings->getRules();

        if(!isset($rules["X"][$parameters["a"]][$parameters["b"]][$parameters["c"]])) {
            throw new HttpException(404, "No mapping found for given parameters");
        }

        $x = $rules["X"][$parameters["a"]][$parameters["b"]][$parameters["c"]];

        return array(
            "x" => $x,
            "y" => $rules["Y"][$x]($parameters["d"], $parameters["e"], $parameters["f"])
         );
    }

    /**
     * Checks input with Doctrine's validator
     * Symfony's retarded forms don't have proper server side validation (at least for the required property), so I've to use the Entity's Asserts and Validator
     *
     * @param               $object
     * @param array         $parameters
     *
     * @throws Symfony\Component\HttpKernel\Exception\HttpException
     */
    private function validateInput($object, $parameters)
    {
        $object->setA(isset($parameters["a"]) ? $parameters["a"] : null);
        $object->setB(isset($parameters["b"]) ? $parameters["b"] : null);
        $object->setC(isset($parameters["c"]) ? $parameters["c"] : null);
        $object->setD(isset($parameters["d"]) ? $parameters["d"] : null);
        $object->setE(isset($parameters["e"]) ? $parameters["e"] : null);
        $object->setF(isset($parameters["f"]) ? $parameters["f"] : null);

        $errors = $this->container->get('validator')->validate($object);

        if (count($errors) > 0) {
            throw new HttpException(400, (string) $errors);
        }
    }

    /**
     * Creates Parameters type object
     *
     * @return new ApiBundle\Entity\Parameters
     *
     */
    private function createObject()
    {
        return new $this->entityClass();
    }
}