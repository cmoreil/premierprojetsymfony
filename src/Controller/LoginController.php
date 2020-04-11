<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Members;
use App\Repository\MembersRepository;
use Symfony\Component\HttpFoundation\Session\Session;


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
        $repository = $this->getDoctrine()->getRepository(Members::class);
        $member = $repository->findOneBy(['email' => $request->request->get('email')]);

        if ($member == null)
        {
            return $this->redirectToRoute('login');
        }
        else
        {
            if (password_verify($request->request->get('password'), $member->getPassword()) == TRUE)
            {
                $session = new Session();
                $session->set('id', $member->getId());
                $session->set('name', $member->getName());
                $session->set('firstname', $member->getFirstname());
                $session->set('username', $member->getUsername());
                $session->set('email', $member->getEmail());
                $session->set('password', $member->getPassword());
                //$session->set('admin', $member->getAdmin());

                return $this->redirectToRoute('espace');
            }
            else
            {
                return $this->redirectToRoute('home');

            }
        }
    }

    public function logout()
        {
            $session = new Session();
            $session->clear();
            return $this->render('auth/logout.html.twig', [
                'title' => "Au revoir !",
            ]);
        }

}