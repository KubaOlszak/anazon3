<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(BookRepository $bookRepository, AuthorRepository $authorRepository): Response
    {
        return $this->render('book/index.html.twig', [
            'title' => 'Liste des livres',
            'books' => $bookRepository->findAll(),
            'author' => $authorRepository->findAll(),
        ]);
    }
}
