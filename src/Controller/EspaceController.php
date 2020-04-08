<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EspaceController extends AbstractController
{
    function EspaceView()
    {
        return $this->render('auth/espace.html.twig', [
            'title' => "Mon espace"
        ]);
    }

}