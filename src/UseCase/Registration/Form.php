<?php

declare(strict_types=1);

namespace App\UseCase\Registration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', Type\TextType::class)
            ->add('lastName', Type\TextType::class)
            ->add('email', Type\EmailType::class)
            ->add('password', Type\PasswordType::class)
            ->add('password', Type\RepeatedType::class, [
                'type' => Type\PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => false],
                'second_options' => ['label' => false]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Command::class
        ]);
    }
}
