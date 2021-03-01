<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="app_books_index")
     */
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findBy([],['createdAt' =>'DESC']);

        return $this->render('books/index.html.twig', compact('books'));
    }

     /**
     * @Route("/books/{id<[0-9]+>}", name="app_books_show")
     */
    public function show(Book $book): Response

    {
    	return $this->render('books/show.html.twig.', compact('book'));
    }
}
