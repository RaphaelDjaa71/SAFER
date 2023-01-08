<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Entity\Categorie;
use App\Repository\SAFERRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FullCategoryController extends AbstractController

{
    private $entitymanager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entitymanager = $entityManager;
    }

    #[Route('/full/category/', name: 'full_category')]
    public function index(): Response
    {
        $categories = $this->entitymanager->getRepository(Categorie::class)->findAll();
        return $this->render('full_category/full.html.twig', [
            'controller_name'=> 'FullCategoryController',
            'categories'=> $categories,

        ]);
    }

    #[Route('/full/category/{id} ', name: 'Prairie')]
    public function s(Request $request): Response
    {
        $id = $request->get('id');
        $categories = $this->entitymanager->getRepository(Categorie::class)->findBy(['id'=>$id]);
        $biens = $this->entitymanager->getRepository(Bien::class)->findBy(['Categorie'=>$categories]);
        $Fullcategories = $this->entitymanager->getRepository(Categorie::class)->findAll();
        return $this->render('full_category/prairie.html.twig',[
            'biens' => $biens,
            'categories'=> $Fullcategories,
        ]);
    }
}
