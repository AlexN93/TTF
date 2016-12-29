<?php

namespace ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParametersType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('a', CheckboxType::class, array(
          'required' => true
        ));

        $builder->add('b', CheckboxType::class, array(
          'required' => true
        ));

        $builder->add('c', CheckboxType::class, array(
          'required' => true
        ));

        $builder->add('d', NumberType::class, array(
          'required' => true
        ));

        $builder->add('e', NumberType::class, array(
          'required' => true
        ));

        $builder->add('f', NumberType::class, array(
          'required' => true
        ));

        $builder->add('x', TextType::class, array(
          'required' => true
        ));

        $builder->add('y', NumberType::class, array(
          'required' => true
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
        ));
    }

    public function getName()
    {
        return 'parameters';
    }

}
