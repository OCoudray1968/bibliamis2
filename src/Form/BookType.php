<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Gender;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add('title', TextType::class,[
                'label'=>'Titre'
            ])
            ->add('author', TextType::class,[
                'label' => 'Auteur'
            ])
            ->add('genders', EntityType::class, [
                'class' => Gender::class,
                'label' => 'Genre',
                'choice_label' => 'genre'
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image (Fichier JPG ou PNG)',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => ' Supprimer ? ',
                'download_uri' => false,
                'imagine_pattern' => 'squared_thumbnail_small'
            ])
            
            ->add('comments', TextareaType::class, [
                'label' => 'Commentaires'
            ])
           ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class
        ]);
    }
}
