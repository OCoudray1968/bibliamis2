<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Gender;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('genders', EntityType::class, [
                'class' => Gender::class,
                'label' => 'Genre',
                'choice_label' => 'genre',
            ])
            ->add('support')
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image (Fichier JPG ou PNG)',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => ' Supprimer ? ',
                'download_uri' => false,
                'imagine_pattern' => 'squared_thumbnail_small'
                ])
            ->add('comments')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
