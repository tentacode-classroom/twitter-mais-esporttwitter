<?php

namespace App\Controller;


use App\Entity\Message;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Tests\Fixtures\ToString;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile/{name}", name="profile")
     */
    public function index($name = "")
    {
        $doctrine = $this->getDoctrine();
        $repository=$doctrine->getRepository(User::class);

        $user = $repository->findOneByFirstname($name);


        $userid = $user->getId('id');

        $doctrine = $this->getDoctrine();
        $repository=$doctrine->getRepository(Message::class);
        $messages = $repository->findByUser($userid);

        $user= $repository->findOneByFirstname($name);


        return $this->render('profile/profile.html.twig', [
            'name' => $name,
            'user' => $user,
            'messages' => $messages,
        ]);
    }
}
