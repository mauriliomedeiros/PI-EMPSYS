<?php

namespace App\Form;

use App\Entity\ModeloEmpilhadeira;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpilhadeiraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fabricante', TextType::class, [
                'label' => 'Fabricante:*',
                'required' => true,
                'attr' => [
                    'maxlength' => 50,
                ]
            ])
            ->add('modelo', TextType::class, [
                'label' => 'Modelo:*',
                'required' => true,
                'attr' => [
                    'maxlength' => 50,
                ]
            ])
            ->add('cargaTotal')
            ->add('caracteristicas', TextareaType::class, [
                'label' => 'Características:',
                'required' => false,
                'attr' => [
                    'rows' => 1,
                    'maxlength' => 2000,
//                    'placeholder' => 'Informe as características',
                ]
            ])
            ->add('aplicacoes', TextareaType::class, [
                    'label' => 'Aplicações:',
                    'required' => false,
                    'attr' => [
                        'rows' => 1,
                        'maxlength' => 2000,
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ModeloEmpilhadeira::class,
        ]);
    }
}
