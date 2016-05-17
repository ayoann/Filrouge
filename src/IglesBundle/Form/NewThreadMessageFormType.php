<?php
namespace IglesBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class NewThreadMessageFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('recipient', 'fos_user_username',null, array('label' => 'Destinataire ', 'translation_domain' => 'IglesBundle'))
                ->add('subject', 'text',null, array('label' => 'Sujet', 'translation_domain' => 'IglesBundle'))
                ->add('body', 'textarea',null, array('label' => 'Message ', 'translation_domain' => 'IglesBundle'));

        ;
    }
    public function getParent()
    {
        return 'FOS\MessageBundle\Form\Type\NewThreadMessageFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_message_message';
    }

}