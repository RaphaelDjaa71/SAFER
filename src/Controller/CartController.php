<?php

namespace App\Controller;

use App\classe\Mail;
use App\Entity\Bien;
use App\Services\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;


class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/mes-favoris', name: 'cart')]
    public function index(SessionInterface $session): Response
    {
        // Récupère l'utilisateur connecté
        $user = $this->getUser();

        // Récupère l'ID de l'utilisateur
        $email = $user->getEmail();
        $firstname = $user->getFirstname();

        $cartComplete = [];
        $cart = $session->get('cart',[]);

        foreach ($cart as $id => $quantity) {
            $objet_bien = $this->entityManager->getRepository(bien::class)->findOneById($id);
            if (!$objet_bien){
                $this->remove($id,$session);
                continue;
            }
            $cartComplete[] = [
                'bien' => $objet_bien,
                'quantity' => $quantity
            ];
        }

        $cartString = "";
        foreach ($cartComplete as $item) {
            $bien = $item['bien'];
            $quantity = $item['quantity'];
            $cartString .= $bien->getIntitule() . " x " . $quantity . "\n<br>" ;
        }

        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete
        ]);
    }

    #[Route('/sendmail', name: 'sendmail')]
    public function mailing(SessionInterface $session):Response
    {
        // Récupère l'utilisateur connecté
        $user = $this->getUser();

        // Récupère l'ID de l'utilisateur
        $email = $user->getEmail();
        $firstname = $user->getFirstname();

        $cartComplete = [];
        $cart = $session->get('cart',[]);

        foreach ($cart as $id => $quantity) {
            $objet_bien = $this->entityManager->getRepository(bien::class)->findOneById($id);
            if (!$objet_bien){
                $this->remove($id,$session);
                continue;
            }
            $cartComplete[] = [
                'bien' => $objet_bien,
                'quantity' => $quantity
            ];
        }

        $cartString = "";
        foreach ($cartComplete as $item) {
            $bien = $item['bien'];
            $quantity = $item['quantity'];
            $cartString .= $bien->getIntitule() . " x " . $quantity . "\n<br>" ;
        }

        $mail = new Mail();
        $content = $cartString ;
        $mail->send($email, $firstname,'Liste de bien Favori',$content);
        $notification = "Votre mail a été envoyé avec succès !";

        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete
        ]);
    }

    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add($id, SessionInterface $session): Response
    {
        $cart =  $session->get('cart', []);
        $cart[$id] = 1;
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart');

    }

    #[Route('/cart/remove/{id}', name: 'remove_my_cart')]
    public function remove($id, SessionInterface $session): Response
    {
        $cart =  $session->get('cart', []);

        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart');
    }

}
