<?php

namespace App\Form;

use App\Entity\Loanning;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loan_date')
            ->add('back_date')
            ->add('ongoing')
            ->add('lender')
            ->add('borrower')
            ->add('book')
            ->add('Disc')
            ->add('movie')
            ->add('game')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Loanning::class,
        ]);
    }
}
