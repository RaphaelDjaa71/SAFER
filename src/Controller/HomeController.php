<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Biens;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
    }
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $biens = $this->entityManager->getRepository(biens::class)->findByIsBest(1);
        return $this->render('home/index.html.twig', [
            'biens' => $biens
        ]);
    }
}
