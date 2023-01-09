<?php

namespace App\Form;

// Importation de classes et d'interfaces
use App\classe\search;
use App\Entity\Categorie;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Déclaration de la classe SearchType qui étend la classe AbstractType
class SearchType extends AbstractType
{
    // Déclaration de la méthode buildForm, qui construit le formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Ajout d'un champ de formulaire au formulaire en cours de construction
        $builder
            ->add('string', TextType::class ,[
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Votre recherche',
                ]
            ])
            // Ajout d'un champ de formulaire de type EntityType au formulaire en cours de construction
            ->add('categories',EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Categorie::class,
                'multiple' => true,
                'expanded' => true
            ])
            ->add('types',EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Type::class,
                'multiple' => true,
                'expanded' => true
            ])
            // Ajout d'un bouton de soumission au formulaire en cours de construction
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ]);
    }

    // Déclaration de la méthode configureOptions, qui configure les options du formulaire
    public function configureOptions(OptionsResolver $resolver): void
    {
        // Définition des valeurs par défaut pour les options du formulaire
        $resolver->setDefaults([
            'data_class' => search::class,
            'methode' => 'GET',
            'crf protection' => false,
        ]);
    }

    // Déclaration de la méthode getBlockPrefix, qui retourne une chaîne vide
    public function getBlockPrefix()
    {
        return '';
    }
}
