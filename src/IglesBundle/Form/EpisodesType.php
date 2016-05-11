<?php

namespace IglesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EpisodesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEpisode', null, array('label' => 'Nom :', 'translation_domain' => 'IglesBundle'))
            ->add('episodePoster', new PosterType, array('label' => 'Poster :', 'translation_domain' => 'IglesBundle'))
            ->add('resumeEpisode', null, array('label' => 'Résume :', 'translation_domain' => 'IglesBundle'))
            ->add('numeroEpisode', null, array('label' => 'Numero épisode :', 'translation_domain' => 'IglesBundle'))

        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'IglesBundle\Entity\Episodes'
        ));
    }
}