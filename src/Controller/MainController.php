<?php

declare(strict_types=1);

namespace App\Controller;

use App\UseCase\Registration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/registration', name: 'registration_form', methods: ['GET', 'POST'])]
    public function form(Request $request, Registration\Handler $handler): Response
    {
        $command = new Registration\Command();

        $form = $this->createForm(Registration\Form::class, $command);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $handler->handle($command);
                return $this->redirectToRoute('home');
            } catch (\DomainException $exception) {
                $this->addFlash('error', $exception->getMessage());
            }
        }

        return $this->render('registration_form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/ajax', name: 'ajax_form', methods: ['GET', 'POST'])]
    public function formAjax(Request $request, Registration\Handler $handler): Response
    {
        $command = new Registration\Command();

        $form = $this->createForm(Registration\Form::class, $command);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $handler->handle($command);
                return $this->redirectToRoute('home');
            } catch (\DomainException $exception) {
                $this->addFlash('error', $exception->getMessage());
            }
        }

        return $this->render('form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/home', name: 'home', methods: ['GET'])]
    public function home(Request $request): Response
    {
        return $this->render('home.html.twig');
    }
}
