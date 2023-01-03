<?php

namespace App\Controller;

use App\Entity\Biens;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BiensController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/nos-biens', name: 'biens')]
    public function index()
    {
        $biens = $this->entityManager->getRepository(Biens::class)->findAll();

        return $this->render('biens/index.html.twig', [
            'biens' => $biens
        ]);

    }
}
