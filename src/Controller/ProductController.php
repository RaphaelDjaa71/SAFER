<?php

namespace App\Controller;

use App\classe\search;
use App\Entity\Bien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\SearchType;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request): Response
    {
        $search = new search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
             $biens = $this->entitymanager->getRepository(Bien::class)->findWithSearch($search);
        }
        else {
            $biens = $this->entitymanager->getRepository(Bien::class)->findAll();
        }

        return $this->render('product/index.html.twig',[
            'biens' => $biens,
            'form' => $form->createView()
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
