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

    // Déclare une méthode index qui prend en argument un objet Request et qui retourne un objet Response. Utilise l'annotation Route pour définir l'URL de la route de cette méthode.
    #[Route('/biens', name: 'biens')]
    public function index(Request $request): Response
    {
        // Crée une nouvelle instance de la classe Search
        $search = new search();
        // Crée un formulaire de recherche en utilisant la classe SearchType et l'instance de la classe Search
        $form = $this->createForm(SearchType::class, $search);

        // Gère la soumission du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide, récupère les biens qui correspondent aux critères de recherche en utilisant la méthode findWithSearch de l'objet Repository de l'entité Bien
        if ($form->isSubmitted() && $form->isValid()){
            $biens = $this->entitymanager->getRepository(Bien::class)->findWithSearch($search);
        }
        // Si le formulaire n'est pas soumis ou n'est pas valide, récupère tous les biens en utilisant la méthode findAll de l'objet Repository de l'entité Bien
        else {
            $biens = $this->entitymanager->getRepository(Bien::class)->findAll();
        }

        // Affiche la vue Twig product/index.html.twig en lui passant en argument la liste des biens et le formulaire de recherche
        return $this->render('product/index.html.twig',[
            'biens' => $biens,
            'form' => $form->createView()
        ]);
    }


    // Déclare une méthode show qui prend en argument un slug (une chaîne de caractères) et qui retourne un objet Response. Utilise l'annotation Route pour définir l'URL de la route de cette méthode.
    #[Route('/bien/{slug} ', name: 'bien')]
    public function show($slug): Response
    {
        // Récupère un bien en utilisant la méthode findOneBySlug de l'objet Repository de l'entité Bien et en lui passant en argument le slug
        $bien = $this->entitymanager->getRepository(Bien::class)->findOneBySlug($slug);

        // Si aucun bien n'est trouvé, redirige vers la page des biens
        if (!$bien){
            return $this->redirectToRoute('biens');
        }

        // Affiche la vue Twig product/show.html.twig en lui passant en argument le bien
        return $this->render('product/show.html.twig',[
            'bien' => $bien
        ]);
    }
}
