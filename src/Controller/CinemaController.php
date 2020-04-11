<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Films;
use App\Entity\Genres;
use App\Repository\FilmsRepository;

class CinemaController extends AbstractController
{
    function CinemaView()
    {
        $repository = $this->getDoctrine()->getRepository(Films::class);
        $films = $repository->findAll();
        $lastFilm = $repository->findLastInserted();

        return $this->render('home/cinema.html.twig', [
            'title' => "CinéCinéma",
            'lastFilm' => $lastFilm,
            'films' => $films
        ]);
    }

    function moreDetails($id)
    {
        $repository = $this->getDoctrine()->getRepository(Films::class);
        $film = $repository->find($id);

        return $this->render('home/moredetails.html.twig', [

                'title' => "CinéCinéma",
                'film' => $film
            ]);
    }
}