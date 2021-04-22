<?php

namespace App\Form;

use App\Entity\Gender;
use App\Entity\Search\DiscSearch;
use App\Entity\Search\MovieSearch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('depositary', IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Déposé par'
                ]
            ])
            ->add('director', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Réalisateur'
                ]
            ])
            ->add('genders', EntityType::class, [
                'required' => false,
                'label' => false,
                'class' => Gender::class,
                'choice_label' => 'genre',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MovieSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}
