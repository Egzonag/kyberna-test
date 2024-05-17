<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Product Name',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a product name.',
                    ]),
                ],
            ])
            ->add('type', TextType::class, [
                'label' => 'Product Type',
            ])
            ->add('model', TextType::class, [
                'label' => 'Product Model',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a model no.',
                    ]),
                ],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
    
}
