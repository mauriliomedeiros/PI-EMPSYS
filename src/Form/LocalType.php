<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Local;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nome', TextType::class, [
                'required' => true,
                'label' => 'Nome:*',
            ])
            ->add('endereco', TextType::class, [
                'required' => true,
                'label' => 'Endereço:*',
            ])
            ->add('cidade', TextType::class, [
                'required' => true,
                'label' => 'Cidade:*',
            ])
            ->add('estado', TextType::class, [
                'required' => true,
                'label' => 'Estado:*',
            ])
            ->add('cep', TextType::class, [
                'required' => true,
                'label' => 'CEP:*',
            ])
            ->add('observacao', TextType::class, [
                'required' => true,
                'label' => 'Observação:*',
            ])
            ->add('cliente', EntityType::class, [
                'class' => Cliente::class,
                'choice_label' => 'razao_social',
                'label' => 'Cliente:*',
                'placeholder' => '---Selecione---',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Local::class,
        ]);
    }
}
