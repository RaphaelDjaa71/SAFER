<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    // Déclare une méthode index qui prend en argument un objet Request et qui retourne un objet Response. Utilise l'annotation Route pour définir l'URL de la route de cette méthode.
    #[Route('/nous-contacter', name: 'contact')]
    public function index(Request $request): Response
    {
        // Crée un formulaire de contact en utilisant la classe ContactType
        $form = $this->createForm(ContactType::class);
        // Gère la soumission du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide, affiche un message de confirmation à l'utilisateur
        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash('notice','Meci de nous avoir contacter. Notre équipe vous répondra dans les plus brefs délais');
        }

        // Affiche la vue Twig contact/index.html.twig en lui passant en argument le formulaire de contact
        return $this->render('contact/index.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
