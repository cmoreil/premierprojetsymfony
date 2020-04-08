<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CameraController extends AbstractController
{
    function Surprise()
    {
        return $this->render('home/camera.html.twig', [
            'title' => "Juste pour toi"
        ]);
    }
}