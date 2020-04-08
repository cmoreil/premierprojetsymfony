<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Films;

class CinemaController extends AbstractController
{
    function CinemaView()
    {
        return $this->render('home/cinema.html.twig', [
            'title' => "CinéCinéma"
        ]);
    }

    /* à rendre visible seulement pour l'administrateur un FORM pour enregistrer les films sur le site et la base mais en attendant*/

    public function CreateFilm(Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $film = new Films();

        $film->setTitle($request->request->get('title'));
        $film->setIdGenre($request->request->get('idGenre'));
        $film->setReleaseDate($request->request->get('releaseDate'));
        $film->setDirector($request->request->get('director'));
        $film->setResum($request->request->get('resum'));
        $film->setDuration($request->request->get('duration'));
        $film->setActors($request->request->get('actors'));

        $entityManager->persist($film);
        $entityManager->flush();

        return new Response('<html><body>New film saves in the DB</body></html>');
    }
}