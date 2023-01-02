<?php

namespace App\Controller;

use App\Entity\Bien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager = $entityManager;
    }

    #[Route('/nos-biens', name: 'biens')]
    public function index(): Response
    {
        $biens = $this->entitymanager->getRepository(Bien::class)->findAll();

        return $this->render('product/index.html.twig',[
            'biens' => $biens
        ]);
    }
}
