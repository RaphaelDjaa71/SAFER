<?php

namespace App\classe;

use App\Entity\Bien;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private $session;

    public function __construct(SessionInterface $session, EntityManagerInterface $entityManager)
    {
        $this->session = $session;
        $this->entityManager = $entityManager;
    }

    public function add($id): void
    {
        $this->session->set('cart', [
            [
                'id' => $id,
                'quantity' => 1
            ]
        ]);
    }

    public function remove()
    {
        return $this->session->remove('cart');
    }

    public function get()
    {
        return $this->session->get('cart');
    }

}

