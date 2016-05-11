<?php

namespace IglesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use IglesBundle\Entity\Poster;

class SeriesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            

            ->add('nomSerie', null, array('label' => 'Nom ', 'translation_domain' => 'IglesBundle'))
            ->add('seriePoster', new PosterType, array('label' => "Poster ", 'translation_domain' => 'IglesBundle'))
            ->add('resumeSerie', null, array('label' => "Résume ", "translation_domain" => "IglesBundle"))

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IglesBundle\Entity\Series'
        ));
    }
}
