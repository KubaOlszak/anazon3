<?php

namespace App\Controller;

use App\DataFixtures\AuthorFixtures;
use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/authors/{id<\d+>}', name: 'app_author_show')]
    public function show(Author $author): Response
    {
        return $this->render('author/show.html.twig', [
            'author' => $author,
        ]);
    }


/*     #[Route('/authors/{id<\d+>}', name: 'app_author_show')]
    public function show(AuthorRepository $author, $id): Response
    {   
        $res = $author->find($id);

        if(!$res) {
            throw new NotFoundHttpException();
        }

        return $this->render('author/show.html.twig', [
            'author' => $res,
        ]);
    } */

    #[Route('/authors/new', name: 'app_author_new')]
    public function new(Request $request, AuthorRepository $authorRepository): Response
    {   
        $form = $this->createForm(AuthorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $author = $form->getData();
            $authorRepository->save($author, true);

            return $this->redirectToRoute('app_author');
        }

        return $this->render('author/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/authors/{id<\d+>}/edit', name: 'app_author_edit')]
    public function edit(Request $request, AuthorRepository $authorRepository, Author $author): Response
    {   
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $author = $form->getData();
            $authorRepository->save($author, true);

            return $this->redirectToRoute('app_author');
        }

        return $this->render('author/edit.html.twig', [
            'form' => $form,
            'author' => $author,
        ]);
    }
}