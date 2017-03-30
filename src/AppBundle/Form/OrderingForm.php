<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            'html5' => false,
            'attr' => [
                'class' => 'js-datepicker',
                'addon' => 'fa fa-calendar',
            ],
        ])
        ->add('ownerName', TextType::class, [
            'label' => 'Заказчик',
            'attr' => [
                'autofocus' => 'on',
                'placeholder' => 'Напишите, как в Кам обращаться',
            ],
        ])
        ->add('phone', TextType::class, [
            'label' => 'Телефон',
            'attr' => [
                'placeholder' => 'Оставьте нам Ваш номер и мы с Вами свяжемся',
            ]
        ])
        ->add('notes', TextareaType::class, [
            'label' => 'Описание',
            'attr' => [
                'placeholder' => 'Опишите здесь все Ваши пожелания',
            ]
        ])
        ->add('completed')
        ->add('save', SubmitType::class, [
            'label' => 'Создать',
            'attr' => [
                'class' => 'btn btn-success',
            ]
        ]);
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
