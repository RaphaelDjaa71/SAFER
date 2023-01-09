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

    // Déclare une méthode index qui retourne un objet Response. Utilise l'annotation Route pour définir l'URL de la route de cette méthode.
    #[Route('/full/category/', name: 'full_category')]
    public function index(): Response
    {
        // Récupère toutes les catégories en utilisant la méthode findAll de l'objet Repository de l'entité Categorie
        $categories = $this->entitymanager->getRepository(Categorie::class)->findAll();

        // Affiche la vue Twig full_category/full.html.twig en lui passant en argument le nom du contrôleur et la liste des catégories
        return $this->render('full_category/full.html.twig', [
            'controller_name'=> 'FullCategoryController',
            'categories'=> $categories,
        ]);
    }

    // Déclare une méthode s qui prend en argument un objet Request et qui retourne un objet Response. Utilise l'annotation Route pour définir l'URL de la route de cette méthode.
    #[Route('/full/category/{id} ', name: 'Prairie')]
    public function s(Request $request): Response
    {
        // Récupère l'ID de la catégorie à partir de la requête HTTP
        $id = $request->get('id');

        // Récupère la catégorie correspondant à l'ID en utilisant la méthode findBy de l'objet Repository de l'entité Categorie
        $categories = $this->entitymanager->getRepository(Categorie::class)->findBy(['id'=>$id]);

        // Récupère les biens qui appartiennent à la catégorie en utilisant la méthode findBy de l'objet Repository de l'entité Bien
        $biens = $this->entitymanager->getRepository(Bien::class)->findBy(['Categorie'=>$categories]);

        // Récupère toutes les catégories en utilisant la méthode findAll de l'objet Repository de l'entité Categorie
        $Fullcategories = $this->entitymanager->getRepository(Categorie::class)->findAll();

        // Affiche la vue Twig full_category/prairie.html.twig en lui passant en argument la liste des biens et de toutes les catégories
        return $this->render('full_category/prairie.html.twig',[
            'biens' => $biens,
            ]);
    }
}
