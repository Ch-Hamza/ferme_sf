<?php

namespace ProductBundle\Form;

use ProductBundle\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('name_ar', TextType::class)
            ->add('category', ChoiceType::class, array(
                'choices' => array(
                    'Mozzarella' => 'Mozzarella',
                    'Fromage blanc' => 'Fromage blanc',
                    'Ricotta' => 'Ricotta',
                ),
                'placeholder' => 'Select',
            ))
            ->add('categoryAr', ChoiceType::class, array(
                'choices' => array(
                    'موزاريلا' => 'موزاريلا',
                    'الجبن الأبيض' => 'الجبن الأبيض',
                    'ريكوتا' => 'ريكوتا',
                ),
                'placeholder' => 'Select',
            ))
            ->add('description', TextareaType::class, array(
                'attr' => [
                    'rows' => 5,
                ]
            ))
            ->add('description_ar', TextareaType::class, array(
                'attr' => [
                    'rows' => 5,
                ],
            ))
            ->add('imageFile', VichImageType::class, array(
                'download_link'     => false,
                'required'    => false,
                'allow_delete' => false,
            ))
            ->add('save',  SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }
}