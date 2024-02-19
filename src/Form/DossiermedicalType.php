<?php

namespace App\Form;

use App\Entity\Docteur;
use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DossiermedicalType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id')
            ->add('groupesang', ChoiceType::class, [
                'choices' => [
                    '------' => '------',
                    'A+' => 'A+',
                    'A-' => 'A-',
                    'B+' => 'B+',
                    'B-' => 'B-',
                    'AB+' => 'AB+',
                    'AB-' => 'AB-',
                    'O+' => 'O+',
                    'O-' => 'O-',
                ],
            ])
            ->add('$patient')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Local::class,
        ]);
    }
}