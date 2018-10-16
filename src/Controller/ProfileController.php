<?php

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{name}", name="profile")
     */
    public function index($name = "")
    {
        $doctrine = $this->getDoctrine();
        $repository=$doctrine->getRepository(User::class);
        $user = $repository->findByName($name);

        dump($user);

        return $this->render('profile/profile.html.twig', [
            'controller_name' => 'ProfileController',
            'name' => $name,
            'user' => $user,
        ]);
    }
}