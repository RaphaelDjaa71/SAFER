<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\Biens;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
    }

    
    #[Route('/', name: 'home')]
    public function homepageAction(Request $request, ManagerRegistry $doctrine)
    {
            // Récupérez l'Entity Manager
        $em = $doctrine->getManager();

        // Récupérez le nombre total de biens dans la base de données
        $query = $em->createQuery('SELECT COUNT(b) FROM App:Biens b');
        $totalBiens = $query->getSingleScalarResult();

        // Récupérez 3 biens au hasard de la base de données
        $biens = [];
        for ($i = 0; $i < 3; $i++) {
            $id = rand(1, $totalBiens);
            $bien = $em->getRepository(Biens::class)->find($id);
            if ($bien) {
                $biens[] = $bien;
            }
        }
            // Affichez le tableau de biens dans la vue
            return $this->render('home/index.html.twig', [
                'biens' => $biens
            ]);
        }





    public function index(): Response
    {
        //$biens = $this->entityManager->getRepository(biens::class)->findByIsBest(1);
        /* return $this->render('home/index.html.twig'
        , [
            'biens' => $biens
        ]); */
    }
}
