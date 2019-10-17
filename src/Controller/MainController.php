<?php

namespace App\Controller;

use App\Form\Type\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main_index", methods={"GET"})
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('main/index.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'last_error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/contact", name="app_main_contact", methods={"GET", "POST"})
     */
    public function contact(Request $request): Response
    {
        $form = $this->createForm(ContactType::class)
            ->handleRequest($request)
        ;

        if ($form->isSubmitted() && $form->isValid()) {
            dump($data = $form->getData());
            // todo send mail

            $this->addFlash('success', 'Thank you!');

            return $this->redirectToRoute('app_main_contact');
        }

        return $this->render('main/contact.html.twig', [
            'contact_form' => $form->createView(),
        ]);
    }
}
