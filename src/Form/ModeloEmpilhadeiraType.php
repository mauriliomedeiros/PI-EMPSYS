<?php

namespace App\Form;

use App\Entity\Maquina\Modelo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeloEmpilhadeiraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fabricante', TextType::class, [
                'required' => true,
                'label' => 'Fabricante:*',
            ])
            ->add('modelo', TextType::class, [
                'required' => true,
                'label' => 'Modelo:*',
            ])
            ->add('cargaTotal', NumberType::class, [
                'required' => true,
                'label' => 'Carga Total:*',
            ])
            ->add('caracteristicas', TextareaType::class, [
                'required' => true,
                'label' => 'Características:*',
                'attr' => [
                    'rows' => 3,
                ],
            ])
            ->add('aplicacoes', TextareaType::class, [
                'required' => true,
                'label' => 'Aplicações:*',
                'attr' => [
                    'rows' => 3,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Modelo::class,
        ]);
    }
}
