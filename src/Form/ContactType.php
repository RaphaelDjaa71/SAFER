<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom',
                ]
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Votre prenom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prenom',
                ]
            ])
            ->add('email',EmailType::class,[
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre email',
                ]
            ])
            ->add('categories',EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Categorie::class,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('type',EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Type::class,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('message', TextareaType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
                'attr' => [
                    'class' => 'btn-block btn-success'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
