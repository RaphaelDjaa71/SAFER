<?php

namespace App\Controller\Admin;

use App\Entity\Bien; // importation de l'entité Bien
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController; // importation de la classe AbstractCrudController
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField; // importation de la classe AssociationField
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField; // importation de la classe ImageField
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField; // importation de la classe SlugField
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField; // importation de la classe TextField

class SAFERCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }

    // Configuration des champs affichés dans le backend pour l'entité Bien
    public function configureFields(string $pageName): iterable
    {
        return [
            // Champ de type image permettant de télécharger une image
            ImageField::new ('illustration')
                // Définition du chemin de base pour accéder aux images
                ->setBasePath('uploads')
                // Définition du répertoire où les images seront téléchargées
                ->setUploadDir('public/uploads')
                // Définition du pattern à utiliser pour le nom du fichier téléchargé
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                // Champ non obligatoire
                ->setRequired(false),
            // Champ de type "slug" (chaine de caractères qui sert d'identifiant dans l'URL) qui prend la valeur de la référence
            SlugField::new('slug')->setTargetFieldName('Reference'),
            // Champ de type texte pour la référence
            TextField::new('Reference'),
            // Champ de type texte pour l'intitulé
            TextField::new('Intitule'),
            // Champ de type textearea pour le descriptif
            TextField::new('Descriptif'),
            // Champ de type texte pour la localisation
            TextField::new('Localisation'),
            // Champ de type texte pour la surface
            TextField::new('Surface'),
            // Champ de type texte pour le prix
            TextField::new('Prix'),
            // Champ de type association avec l'entité Type
            AssociationField::new('type'),
            // Champ de type association avec l'entité Categorie
            AssociationField::new('Categorie'),
        ];
    }

}