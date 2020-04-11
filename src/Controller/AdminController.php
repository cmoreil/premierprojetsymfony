<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Films;
use App\Entity\Genres;
use App\Entity\Members;

class AdminController extends AbstractController
{

    public function View()
    {
        return $this->render('auth/admin.html.twig', [
            'title' => "Administration"]
        );
    }

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

    public function CreateGenre(Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $genre = new Genres();

        $genre->setIdGenre($request->request->get('idGenre'));
        $genre->setName($request->request->get('name'));

        $entityManager->persist($genre);
        $entityManager->flush();

        return new Response('<html><body>New genre saves in the DB</body></html>');
    }
}