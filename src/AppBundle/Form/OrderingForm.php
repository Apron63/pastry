<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class OrderingForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('createdAt', DateType::class, [
            'label' => 'Дата заявки',
            'format' => 'dd-mm-yyyy',
            'widget' => 'single_text',
            // do not render as type="date", to avoid HTML5 date pickers
            'html5' => false,
            // add a class that can be selected in JavaScript
            'attr' => ['class' => 'js-datepicker'],
            'invalid_message' => 'Неверная дата!',
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
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Ordering',
            'required' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ordering';
    }


}
