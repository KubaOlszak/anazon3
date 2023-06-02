<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello/{mixing<[a-z]{3,10}>}', name: 'app_hello')]
    public function index(string $titleMix = 'Neve / SSL'): Response
    {
        return $this->render('hello/index.html.twig', [
            'mixing' => $titleMix,
            'cameras' => [
                'brand' => ['canon', 'nikon', 'minolta'],
                'lens' => ['soligor', 'pentacon'],
                'owner' => [],
                '' => [],
            ]
        ]);
    }
}
