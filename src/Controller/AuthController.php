<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Members;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\MembersRepository;

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
        $password_hash = password_hash($request->request->get('password'), PASSWORD_DEFAULT);
        $member->setPassword($password_hash);

        try {
            $member->validate();
            }
        catch (\Exception $e) {
            echo 'Exception : ',$e->getMessage();
            exit();
        }

        $entityManager->persist($member);
        $entityManager->flush();

        return $this->redirectToRoute('login');
    }
}

