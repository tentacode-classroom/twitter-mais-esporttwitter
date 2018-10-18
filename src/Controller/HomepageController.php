<?php

namespace App\Controller;

use App\Form\AddMessageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
use App\Entity\User;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        $message = new Message();
        $form = $this->createForm(AddMessageType::class, $message);
        $message->setPublication(rand(0,60));
        $message->setUserId(null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($message);
            $entityManager->flush();

        }

        $doctrine = $this->getDoctrine();
        $repository=$doctrine->getRepository(Message::class);
        $messages = $repository->findAll();

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'form' => $form->createView(),
            'messages' => $messages,
        ]);
    }
}
