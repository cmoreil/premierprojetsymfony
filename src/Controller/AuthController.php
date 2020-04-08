<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Members;
use Doctrine\ORM\EntityManagerInterface;


class AuthController extends AbstractController
{
    public function registerView()
    {
        return $this->render('auth/register.html.twig', [
            'controller_name' => 'AuthController']
        );
    }

    public function CreateMember(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $member = new Members();

        $member->setName($request->request->get('name'));
        $member->setFirstname($request->request->get('firstname'));
        $member->setUsername($request->request->get('username'));
        $member->setEmail($request->request->get('email'));
        $member->setPassword($request->request->get('password'));
        //$member->setCreationDate($request->request->get('creationdate'));
        //$member->setLastPost($request->request->get('lastPost'));

        var_dump($member);

        $entityManager->persist($member);
        $entityManager->flush();

        return $this->render('home/home.html.twig', [
            'title' => "Home sweet home",
            'qui' => $_POST['username']]
        );
    }
}

