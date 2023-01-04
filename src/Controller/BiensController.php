<?php

namespace App\Controller;

use App\Entity\Biens;
use App\Classe\Search;
use App\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BiensController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/nos-biens', name: 'biens')]
    public function index(Request $request)
    {
        $biens = $this->entityManager->getRepository(Biens::class)->findAll();

        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){ /*formulaire soumit et valide*/
            $biens = $this->entityManager->getRepository(Biens::class)->findWithSearch($search);
        }

        return $this->render('biens/index.html.twig', [
            'biens' => $biens,
            'form' => $form->createView()
        ]);

    }

    

    #[Route('/bien/{title}', name: 'bien')]
    public function show($title)
    {
        $bien = $this->entityManager->getRepository(Biens::class)->findOneByTitle($title);

        if(!$bien){
            return $this->redirectToRoute('biens');
        }
        return $this->render('biens/show.html.twig', [
            'bien' => $bien
        ]);

    }
}
