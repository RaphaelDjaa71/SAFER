<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountPasswordController extends AbstractController
{
    private $entityManager;

    /**
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/compte/modifier_mot_de_passe', name: 'app_account_password')]
    public function index(Request $request, UserPasswordHasherInterface $hasher): Response
    {
        $notification = null;

        // Récupère l'utilisateur courant
        $user = $this->getUser();

        // Crée un formulaire pour changer le mot de passe de l'utilisateur
        $form = $this->createForm(ChangePasswordType::class, $user);

        // Traite la requête HTTP
        $form->handleRequest($request);

        // Récupère les contacts de l'utilisateur à partir du formulaire
        $contacts = $form->get('contacts')->getData();

        // Si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {

            // Récupère l'ancien mot de passe de l'utilisateur à partir du formulaire
            $old_pwd = $form->get('old_password')->getData();

            // Si l'ancien mot de passe de l'utilisateur correspond à celui en base de données
            if($hasher->isPasswordValid($user, $old_pwd)) {

                // Récupère le nouveau mot de passe de l'utilisateur à partir du formulaire
                $new_pwd = $form->get('new_password')->getData();

                // Encode le nouveau mot de passe de l'utilisateur
                $password = $hasher->hashPassword($user,$new_pwd);

                // Change le mot de passe de l'utilisateur en base de données
                $user->setPassword($password);
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                // Affiche un message de confirmation à l'utilisateur
                $notification = "Votre mot de passe a bien été mis à jour / Ainsi que votre numéro si changement effectué !";
            }
            else {
                // Affiche un message d'erreur à l'utilisateur si l'ancien mot de passe est incorrect
                $notification = "Votre mot de passe actuel est incorrect !";
            }

        }

        // Affiche la vue Twig account/password.html.twig en lui passant en argument le formulaire de changement de mot de passe et le message de notification
        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
            // Formulaire de changement de mot de passe
            'notification' => $notification,
        ]);
    }
}
