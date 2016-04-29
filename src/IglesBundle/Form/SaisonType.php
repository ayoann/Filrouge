<?php

namespace IglesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SaisonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('posterSaisons', null, array('label' => 'Poster Saison', 'translation_domain' => 'IglesBundle'))
            ->add('resumeSaisons', null, array('label' => "Résumé Saison", 'translation_domain' => 'IglesBundle'))
            ->add('numeroSaisons', null, array('label' => "Numéro Saison", "translation_domain" => "IglesBundle"))        
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IglesBundle\Entity\Saison'
        ));
    }
}