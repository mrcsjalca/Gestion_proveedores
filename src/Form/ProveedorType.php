<?php

namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre del Proveedor',
                'attr' => ['placeholder' => 'Ingrese el nombre del proveedor'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Correo Electrónico',
                'attr' => ['placeholder' => 'Ingrese el correo electrónico'],
            ])
            ->add('telefono', TextType::class, [
                'label' => 'Número de Teléfono',
                'attr' => ['placeholder' => 'Ingrese el número de teléfono'],
            ])
            ->add('activo', CheckboxType::class, [
                'label' => 'Proveedor Activo',
                'required' => false,
            ])
            ->add('tipo', ChoiceType::class, [
                'label' => 'Tipo de Proveedor',
                'choices' => [
                    'Hotel' => 'hotel',
                    'Crucero' => 'crucero',
                    'Estación de esquí' => 'esqui',
                    'Parque temático' => 'parque',
                ],
            ])

        ;
    }

public function configureOptions(OptionsResolver $resolver): void
{
    $resolver->setDefaults([
        'data_class' => Proveedor::class,
        'csrf_protection' => true,
        'csrf_field_name' => '_token',
        'csrf_token_id' => 'proveedor_item',
    ]);
}

    
}
