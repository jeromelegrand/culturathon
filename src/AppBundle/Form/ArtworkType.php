<?php

namespace AppBundle\Form;

use AppBundle\Entity\Artist;
use AppBundle\Entity\ArtStyle;
use AppBundle\Entity\Museum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtworkType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('characteristics')
            ->add('description')
            ->add('artist', EntityType::class, [
                'label' => 'Artist',
                'class' => Artist::class,
                'choice_label' => 'firstName',
                'invalid_message' => 'Le champ est invalide.',
            ])
            ->add('museum', EntityType::class, [
                'label' => 'Musée',
                'class' => Museum::class,
                'choice_label' => 'name',
                'invalid_message' => 'Le champ est invalide.',
            ])
            ->add('artStyle', EntityType::class, [
                'label' => 'Style',
                'class' => ArtStyle::class,
                'choice_label' => 'name',
                'invalid_message' => 'Le champ est invalide.',
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Artwork'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_artwork';
    }


}
