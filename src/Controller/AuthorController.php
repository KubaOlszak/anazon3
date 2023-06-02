<?php

namespace App\Controller;

use App\DataFixtures\AuthorFixtures;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/authors', name: 'app_author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/index.html.twig', [
            'title' => 'Liste des auteurs',
            'authors' => $authorRepository->findAll(),
        ]);
    }
/* 
    #[Route('/authors/{id<\d+>}', name: 'app_author_show')]
    public function show(Author $author): Response
    {
        return $this->render('author/show.html.twig', [
            'author' => $author,
        ]);
    }
 */

    #[Route('/authors/{id<\d+>}', name: 'app_author_show')]
    public function show(AuthorRepository $author, $id): Response
    {   
        $res = $author->find($id);

        if(!$res) {
            throw new NotFoundHttpException();
        }

        return $this->render('author/show.html.twig', [
            'author' => $res,
        ]);
    }
}