<?php

namespace App\Controller;

use App\classe\Cart;
use App\Entity\Bien;
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
        $cartComplete = [];
        $cart = $session->get('cart',[]);

        foreach ($cart as $id => $quantity) {
            $cartComplete[] = [
                'bien' => $this->entityManager->getRepository(bien::class)->findOneById($id),
                'quantity' => $quantity
            ];
        }

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
        dd($session->get('cart'));

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

        return $this->redirectToRoute('biens');
    }
}
