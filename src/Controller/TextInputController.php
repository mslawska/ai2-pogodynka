<?php

namespace App\Controller;

use App\Form\TextInputType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class TextInputController extends AbstractController
{
    #[Route('/text/input', name: 'app_text_input')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(TextInputType::class);

        $form->handleRequest($request);
        $submittedText = null;

        if ($form->isSubmitted() && $form->isValid()) {
            $submittedText = $form->getData()['text'];
        }
        return $this->render('text_input/index.html.twig', [
            'form' => $form->createView(),
            'submittedText' => $submittedText,
        ]);
    }
}
