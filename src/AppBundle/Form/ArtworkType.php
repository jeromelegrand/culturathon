<?php

namespace AppBundle\Form;

use AppBundle\Entity\Artist;
use AppBundle\Entity\ArtStyle;
use AppBundle\Entity\Artwork;
use AppBundle\Entity\Museum;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtworkType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'oeuvre',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('characteristics', TextareaType::class, [
                'label' => 'Caractéristiques',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('juniorDescription', TextareaType::class, [
                'label' => 'Description de l\'oeuvre pour les enfants',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('standardDescription', TextareaType::class, [
                'label' => 'Description standard de l\'oeuvre',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('advancedDescription', TextareaType::class, [
                'label' => 'Description avancée de l\'oeuvre',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type d\'oeuvre',
                'choices' => [
                    'Photographie' => 'Photographie',
                    'Peinture' => 'Peinture',
                    'Musique' => 'Musique',
                    'Sculpture' => 'Sculpture',
                    'Littérature' => 'Littérature',
                    'attr' => ['class' => 'mb-4'],
                ]
            ])
            ->add('picture', TextareaType::class, [
                'label' => 'Lien vers l\'illustration de l\'oeuvre',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('artist', EntityType::class, [
                'class' => Artist::class,
                'label' => 'Artiste',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('museum', EntityType::class, [
                'class' => Museum::class,
                'label' => 'Lieu d\'exposition',
                'attr' => ['class' => 'mb-4'],
            ])
            ->add('artStyle', EntityType::class, [
                'class' => ArtStyle::class,
                'label' => 'Style de l\'oeuvre',
                'attr' => ['class' => 'mb-4'],
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Artwork::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_bundle_artwork';
    }


}
