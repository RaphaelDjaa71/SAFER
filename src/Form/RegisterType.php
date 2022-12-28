<?php

namespace App\Form;

 use App\Entity\User;
use Symfony\Component\Form\AbstractType;
 use Symfony\Component\Form\Extension\Core\Type\EmailType;
 use Symfony\Component\Form\Extension\Core\Type\PasswordType;
 use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
 use Symfony\Component\Form\Extension\Core\Type\SubmitType;
 use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 use Symfony\Component\Validator\Constraints\Length;

 class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            /*
             * Chaque information du formulaire d'inscription est rattaché à un type 'TextType, EmailType, etc...'
             * qui vérifie si la saisie est correcte, et possède un label qui indique l'information que l'utilisateur
             * doit fournir. Sans oublier les attr qui permettent de ne pas laisser les champs vite et donner des indications
             * supplémentaire sur la saisie. Aussi les contraintes comme avec la longueur du prénom qui doit être d'au moins
             * 02 caractères et au plus 30 caratères
             */
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre nom'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 60,
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre email'
                ]
            ])
            ->add('contacts', TextType::class, [
                'label' => 'Contacts',
                'constraints' => new Length([
                    'min' => 8,
                    'max' => 10,
                ]),
                'attr' => [
                    'placeholder' => 'Saisissez votre numéro de téléphone'
                ]
            ])

            // Pour le mot de passe 'RepeatedType' permet de vérifier le mot de passe avec deux champs différents
            // qui doivent avoir le même contenu, dans le cas contraire l'utilisateur reçoit un message d'erreur
            // disant que la confirmation est incorrecte.

            ->add('password',RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique !',
                'label' => 'Mot de passe',
                'required' => 'true',
                'first_options' => [ 'label' => 'Mot de passe',
                    'attr' => [
                    'placeholder' => 'Saisissez votre mot de passe' ]
                ],
                'second_options' => [ 'label' => 'Confirmation du mot de passe', 'attr' => [
                    'placeholder' => 'Confirmez votre mot de passe' ]
                ]
            ])

            // Pour le bouton submit il permet de valider sa demande et enregistre les informations saisies
            // dans notre base de donnée.

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
