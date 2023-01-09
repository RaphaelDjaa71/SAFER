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

        $user = $this->getUser();
        dd($user);
        $form = $this->createForm(ChangePasswordType::class, $user);

        $form->handleRequest($request);

        $contacts = $form->get('contacts')->getData();
        $contacts = $contacts;
        $user->setContacts($contacts);


        if ($form->isSubmitted() && $form->isValid()) {
            $old_pwd = $form->get('old_password')->getData();

            if($hasher->isPasswordValid($user, $old_pwd)) { // vérifie si le user et le mot de passe encodé correspondent à ceux en BD
                $new_pwd = $form->get('new_password')->getData(); // récupère le nouveau mot de passe
                $password = $hasher->hashPassword($user,$new_pwd); // change le mot de passe

                $user->setPassword($password);
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $notification = "Votre mot de passe a bien été mis à jour / Ainsi que votre numéro si changement effectué !";
            }
            else {
                $notification = "Votre mot de passe actuel est incorrect !";
            }
        }

        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),// Formulaire de changement de mot de passe
            'notification' => $notification,
        ]);
    }
}
