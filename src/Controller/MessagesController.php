<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessagesType;
use Symfony\Component\Mime\Message;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Mailer;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class MessagesController extends AbstractController
{
    /**
     * @Route("/messages", name="messages")
     */
    public function index(): Response
    {
        return $this->render('messages/index.html.twig', [
            'controller_name' => 'MessagesController',
        ]);
    }

    /**
     * @Route("/send", name="send")
     */
    public function send(Request $request, MailerInterface $mailer): Response
    {
        $message = new Messages();
        $form = $this->createForm(MessagesType::class, $message);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message->setSender($this->getUser());

            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            // dd($message->getRecipient()->getEmail());
            $em->flush();

            $email = (new TemplatedEmail())
                ->from('no-reply@manawalua.fr')
                ->to($message->getRecipient()->getEmail())
                ->subject('Messagerie - Nouveau message.')
                ->htmlTemplate('messages/notifications.html.twig');


            $mailer->send($email);

            $this->addFlash("message", "Votre message à bien été envoyé");
            return $this->redirectToRoute('messages');
        }

        return $this->render("messages/send.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/received", name="received")
     */
    public function received(): Response
    {
        return $this->render('messages/received.html.twig');
    }

    /**
     * @Route("/sent", name="sent")
     */
    public function sent(): Response
    {
        return $this->render('messages/sent.html.twig');
    }

    /**
     * @Route("/read/{id}", name="read")
     */
    public function read(Messages $message): Response
    {
        $message->setIsRead(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($message);
        $em->flush();
        return $this->render('messages/read.html.twig', compact("message"));
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Messages $message): Response
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($message);
        $em->flush();
        return $this->redirectToRoute("received");
    }
}