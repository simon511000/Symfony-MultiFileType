<?php

namespace App\Controller;

use App\Form\MultiFileType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/', name: 'app_demo')]
    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('demo', MultiFileType::class)
            ->add('submit', SubmitType::class)
            ->getForm();
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            dd($data);
        }

        return $this->render('demo/index.html.twig', [
            'form' => $form,
        ]);
    }
}
