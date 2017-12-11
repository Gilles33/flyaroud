<?php
/**
 * Created by PhpStorm.
 * User: gilles
 * Date: 11/12/17
 * Time: 21:57
 */

namespace WCS\CoavBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')
                ->add('LastName', TextType::class, array('required' => 'true'))
                ->add('phoneNumber', TextType::class, array('required' => 'true'))
                ->add('birthDate', BirthdayType::class, array('required' => 'true'))
                ->add('creationDate', DateType::class, array('required' => 'true'))
                ->add('isACertifiedPilot')
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}