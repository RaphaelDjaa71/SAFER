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
    public function index(): Response
    {
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bien');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user ', Utilisateur::class);
        yield MenuItem::linkToCrud('Favori', 'fas fa-bars ',Favori::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list ', Categorie::class);
        yield MenuItem::linkToCrud('Type', 'fas fa-shop ', Type::class);
        yield MenuItem::linkToCrud('Bien', 'fas fa-house ',Bien::class);
    }
}