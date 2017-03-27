<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class OrderingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('createdAt', DateType::class, [
            'widget' => 'choice',
            'label' => 'Дата заявки',
            // do not render as type="date", to avoid HTML5 date pickers
            'html5' => false,
            // add a class that can be selected in JavaScript
            'attr' => ['class' => 'js-datepicker'],
        ])
        ->add('ownerName', TextType::class, ['label' => 'Заказчик'])
        ->add('phone', TextType::class, ['label' => 'Телефон'])
        ->add('notes')
        ->add('completed');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ordering'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ordering';
    }


}
