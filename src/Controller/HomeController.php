<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Members;

class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('home/home.html.twig', [
            'title' => "Home sweet home",
            'qui' => "les amis"
        ]);
    }

    function home()
    {
        $session = new Session();

        if ($session->get('id'))
        {
            return $this->render('home/home.html.twig', [
                'title' => "Home sweet home",
                'qui' => $session->get('username'),
                'isAdmin' => false
            ]);
        }

        elseif ($session->get('admin') == 1)
        {
            return $this->render('home/home.html.twig', [
                'title' => "Home sweet home",
                'qui' => $session->get('username'),
                'isAdmin' => true
            ]);
        }

        else
        {
            return $this->render('home/home.html.twig', [
                'title' => "Home sweet home",
                'qui' => "les amis"
            ]);
        }
    }
}