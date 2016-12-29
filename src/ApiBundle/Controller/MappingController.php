<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use JMS\DiExtraBundle\Annotation as DI;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MappingController extends FOSRestController
{

    /**
     * Do the mapping, calculate, persist and return result.
     *
     * @Post("/mappings", name="api_post_mapping", options={ "method_prefix" = false })
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return array
     */
    public function postMappingAction(Request $request)
    {
        $object = $this->container->get("api.mapping.handler")->post($request);
        return array(
          "success" => true,
          "data" => $object
        );
    }

    /**
     * Get all records.
     *
     * @Get("/mappings", name="api_get_mappings", options={ "method_prefix" = false })
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @return array
     */
    public function getMappingsAction()
    {
        $objects = $this->container->get('api.mapping.handler')->getAll();
        return array(
          "success" => true,
          "data" => $objects
        );
    }

    /**
     * Get single record.
     *
     * @Get("/mappings/{id}", name="api_get_mapping", options={ "method_prefix" = false })
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the communication is not found"
     *   }
     * )
     *
     * @param int     $id      the record id
     *
     * @return array
     *
     */

    public function getMappingAction($id)
    {
        $object = $this->container->get('api.mapping.handler')->get($id);
        return array(
          "success" => true,
          "data" => $object
        );
    }



}