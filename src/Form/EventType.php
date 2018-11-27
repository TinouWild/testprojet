<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Event;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', EntityType::class, ['class' => Type::class, 'choice_label' => 'type', 'disabled' => true])
            ->add('name')
            ->add('description')
            ->add('dateStart', DateTimeType::class, array(
                'date_widget' => 'choice'
            ))
            ->add('dateEnd')
            ->add('category', EntityType::class, ['class' => Category::class, 'choice_label' => 'category'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
