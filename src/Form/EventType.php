<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Event;
use App\Entity\Type;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('dateStart', DateTimeType::class, ['date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('dateEnd', DateTimeType::class, ['date_widget' => 'single_text',
                'time_widget' => 'single_text'])
            ->add('type', EntityType::class, ['class' => Type::class, 'choice_label' => 'type'])
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
