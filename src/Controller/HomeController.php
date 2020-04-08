<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
        return $this->render('home/home.html.twig', [
            'title' => "Home sweet home",
            'qui' => "les amis"
        ]);
    }
}