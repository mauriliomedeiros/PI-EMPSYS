<?php

namespace App\Form;

use App\Entity\ModeloEmpilhadeira;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModeloEmpilhadeiraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fabricante')
            ->add('modelo')
            ->add('cargaTotal')
            ->add('caracteristicas')
            ->add('aplicacoes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ModeloEmpilhadeira::class,
        ]);
    }
}
