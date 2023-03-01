<?php

declare(strict_types=1);

namespace App\UseCase\RegistrationAjax;

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
            ->add('password', Type\RepeatedType::class, [
                'type' => Type\PasswordType::class,
                'label' => 'form.register.password.label',
                'label_attr' => ['class' => 'text-blue'],
                'invalid_message' => 'The passwords do not match!',
                'error_bubbling' => true,
                'first_options' => [
                    'attr' => ['placeholder' => 'form.register.password.opt1.placeholder', 'class' => 'form-control']
                ],
                'second_options' => [
                    'attr' => ['placeholder' => 'form.register.password.opt2.placeholder', 'class' => 'mt-1 form-control']]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Command::class
        ]);
    }
}
