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

    #[Route('/biens', name: 'biens')]
    public function index(): Response
    {
        $biens = $this->entitymanager->getRepository(Bien::class)->findAll();

        return $this->render('product/index.html.twig',[
            'biens' => $biens
        ]);
    }

    #[Route('/bien/{slug} ', name: 'bien')]
    public function show($slug): Response
    {
        $bien = $this->entitymanager->getRepository(Bien::class)->findOneBySlug($slug);

        if (!$bien){
            return $this->redirectToRoute('biens');
        }

        return $this->render('product/show.html.twig',[
            'bien' => $bien
        ]);
    }
}
