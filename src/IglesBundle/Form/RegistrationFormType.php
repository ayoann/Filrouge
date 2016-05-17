<?php
namespace IglesBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use IglesBundle\Entity\Poster;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        /**
        * @param FormBuilderInterface $builder
        * @param array $options
        */
        $builder
            ->add('firstName', null, array('label' => "Prénom ", 'translation_domain' => 'IglesBundle'))
            ->add('lastName', null, array('label' => " Nom ", 'translation_domain' => 'IglesBundle'))
            ->add('birthday', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd', 'label' => "Date de naissance ", 'translation_domain' => 'IglesBundle',
            ));
        
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

    public function getName()
    {
        return $this->getBlockPrefix();
    }

 
   
}