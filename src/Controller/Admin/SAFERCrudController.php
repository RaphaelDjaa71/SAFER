<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SAFERCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bien::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new ('illustration')
                ->setBasePath('uploads')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('Reference'),
            TextField::new('Intitule'),
            TextField::new('Descriptif'),
            TextField::new('Localisation'),
            TextField::new('Surface'),
            TextField::new('Prix'),
            AssociationField::new('type'),
            AssociationField::new('Categorie'),
        ];
    }

}
