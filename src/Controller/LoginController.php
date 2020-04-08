<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class LoginController extends AbstractController
{
    public function loginView()
    {
        return $this->render('auth/login.html.twig', [
            'title' => "On se connait déjà",
        ]);
    }

    public function postLogin(Request $request)
    {
        return $this->render('home/home.html.twig', [
            'title' => "Home sweet home",
            'qui' => $_POST['username']]
        );
    }

    public function logout()
        {
            return $this->render('auth/logout.html.twig', [
                'title' => "Au revoir et à bientôt !",
            ]);
        }

}