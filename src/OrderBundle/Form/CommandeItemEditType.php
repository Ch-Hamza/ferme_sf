<?php

namespace OrderBundle\Form;

use CommandeBundle\Entity\CommandeItem;
use OrderBundle\Entity\OrderItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeItemEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', IntegerType::class, array(
                'data' => 1,
                'attr' =>  array('min' => 1),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => OrderItem::class,
        ));
    }
}