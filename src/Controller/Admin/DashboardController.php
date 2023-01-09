<?php

namespace App\Controller\Admin;

use App\Entity\Biens;
use App\Entity\Categorie;
use App\Entity\Bien;
use App\Entity\Favori;
use App\Entity\Type;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    // Renvoie la vue Twig admin/dashboard.html.twig
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    // Définit le titre du tableau de bord de l'interface d'administration
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bien');
    }

    // Définit les éléments de menu de l'interface d'administration
    public function configureMenuItems(): iterable
    {
        // Ajoute un lien vers le tableau de bord dans le menu de l'interface d'administration
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        // Ajoute un lien vers la gestion des utilisateurs dans le menu de l'interface d'administration
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user ', Utilisateur::class);

        // Ajoute un lien vers la gestion des favoris dans le menu de l'interface d'administration
        yield MenuItem::linkToCrud('Favori', 'fas fa-bars ',Favori::class);

        // Ajoute un lien vers la gestion des catégories dans le menu de l'interface d'administration
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list ', Categorie::class);

        // Ajoute un lien vers la gestion des types de bien dans le menu de l'interface d'administration
        yield MenuItem::linkToCrud('Type', 'fas fa-shop ', Type::class);

        // Ajoute un lien vers la gestion des biens dans le menu de l'interface d'administration
        yield MenuItem::linkToCrud('Bien', 'fas fa-house ',Bien::class);
    }
}