<?php

namespace App\Controller\Admin;

use App\Entity\Biens;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BiensCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Biens::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            //SlugField::new('slug')->setTargetFieldName('title'),
            ImageField::new('illustration')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('number'),
            TextareaField::new('description'),
            TextField::new('ville'),
            TextField::new('codepostal'),
            // BooleanField::new('isBest'),
            MoneyField::new('price')->setCurrency('EUR'),
            NumberField::new('surface'),
            AssociationField::new('Category'),
        ];
    }

}
