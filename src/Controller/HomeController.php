<?php

namespace App\Controller;

use App\classe\Mail;
use App\Entity\Bien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // récupère tous les biens
        $biens = $this->entitymanager->getRepository(Bien::class)->findAll();

        // mélange les biens aléatoirement
        shuffle($biens);

        // prend les 3 premiers biens de la liste mélangée
        $randomBiens = array_slice($biens, 0, 3);

        return $this->render('home/index.html.twig',[
            'ControllerName' => 'HomeController',
            'randomBiens' => $randomBiens
        ]);
    }
}
