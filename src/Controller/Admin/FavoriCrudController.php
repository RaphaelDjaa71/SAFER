<?php

namespace App\Controller\Admin;

use App\Entity\Favori;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FavoriCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Favori::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Utilisateur'),
            TextField::new('Bien'),
        ];
    }

}
