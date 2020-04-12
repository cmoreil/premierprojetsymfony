<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class EspaceController extends AbstractController
{
    function EspaceView()
    {
        $session = new Session();

        if ($session->get('id'))
        {
            return $this->render('auth/espace.html.twig', [
                'title' => 'Bienvenue cher inscrit',
                'isLog' => true,
                'name' => $session->get('name'),
                'firstname' => $session->get('firstname'),
                'username' => $session->get('username'),
                'email' => $session->get('email'),
                'password' => $session->get('password')
            ]);
        }
        else
        {
            return $this->render('auth/espace.html.twig', [
                'title' => "Cet espace est réservé aux membres !",
                'isLog' => false
                ]);
        }
    }
}