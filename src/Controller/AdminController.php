<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FilmsRepository;
use App\Entity\Films;
use App\Entity\Genres;
use App\Entity\Members;

class AdminController extends AbstractController
{

    public function View()
    {
        $repository = $this->getDoctrine()->getRepository(Members::class);
        $members = $repository->findAll();

        return $this->render('auth/admin.html.twig', [
            'title' => "Administration",
            'members' => $members]
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

        return $this->redirectToRoute('cinema');
    }

    public function CreateGenre(Request $request) : Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $genre = new Genres();

        $genre->setIdGenre($request->request->get('idGenre'));
        $genre->setName($request->request->get('name'));

        $entityManager->persist($genre);
        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }

    function ViewByOne($id)
    {
        $repository = $this->getDoctrine()->getRepository(Members::class);
        $member = $repository->find($id);

        return $this->render('auth/viewbyone.html.twig', [

                'title' => "Administration",
                'member' => $member
            ]);
    }

    function DeleteOne($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $member = $entityManager->getRepository(Members::class)->find($id);

        $entityManager->remove($member);
        $entityManager->flush();

        return $this->redirectToRoute('admin');
    }

    public function UpdateOne($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $member = $entityManager->getRepository(Members::class)->find($id);

        if (!$member)
        {
            throw $this->createNotFoundException(
                'No member found for id l\'ami !'.$id
            );
        }
        else
        {
            return $this->render('auth/updateone.html.twig', [
            'title' => "Administration",
            'member' => $member
        ]);
        }
    }

    public function PostUpdateOne(Request $request, $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $member = $entityManager->getRepository(Members::class)->find($id);

        if (!$member)
        {
            throw $this->createNotFoundException(
                'No member found for id l\'ami !'.$id
            );
        }
        else
        {
        $member->setName($request->request->get('name'));
        $member->setFirstname($request->request->get('firstname'));
        $member->setUsername($request->request->get('username'));
        $member->setEmail($request->request->get('email'));

        $entityManager->flush();

        return $this->redirectToRoute('admin');
        }
    }

}