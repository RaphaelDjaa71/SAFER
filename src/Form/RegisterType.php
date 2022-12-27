<?php

namespace App\Form;

 use App\Entity\User;
use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\Extension\Core\Type\EmailType;
 use Symfony\Component\Form\Extension\Core\Type\PasswordType;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Saisissez votre nom'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Saisissez votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]
            ])
            ->add('contacts', TextType::class, [
                'label' => 'Contacts',
                'attr' => [
                    'placeholder' => 'Saisissez votre numéro de téléphone'
                ]
            ])
            ->add('password',PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe'
                ]
            ])
            ->add('password_confirm',PasswordType::class, [
                'label' => 'Confirmation',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Confirmez votre mot de passe'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
