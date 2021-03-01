<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="app_books_index",methods="GET")
     */
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findBy([],['createdAt' =>'DESC']);

        return $this->render('books/indexBooks.html.twig', compact('books'));
    }

    
     /**
     * @Route("/books/create", name="app_books_create", methods="GET|POST")
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $book = new Book;
        $form = $this->createFormBuilder($book)
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('comments', TextareaType::class)
            ->getForm()
            ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('app_books_index');

        }

        return $this->render('books/createBooks.html.twig',[
            'formCreateBook' => $form->createView()
        ]);
    }

     /**
     * @Route("/books/{id<[0-9]+>}", name="app_books_show",methods="GET")
     */
    public function show(Book $book): Response

    {
        return $this->render('books/showBooks.html.twig.', compact('book'));
    }

     /**
     * @Route("/books/{id<[0-9]+>}/edit", name="app_books_edit",methods="GET|POST")
     */
    public function edit(Request $request,Book $book, EntityManagerInterface $em): Response

    {
         $form = $this->createFormBuilder($book)
            ->add('title', TextType::class)
            ->add('author', TextType::class)
            ->add('comments', TextareaType::class)
            ->getForm()
            ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->flush();

            return $this->redirectToRoute('app_books_index');

        }
        return $this->render('books/editBooks.html.twig.', [
            'book' => $book,
            'formEditBook' => $form->createView()
        ]);

        
    }    
}
