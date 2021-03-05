<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\isCsrfTokenValid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\denyAccessUnlessGranted;

class MoviesController extends AbstractController
{
     /**
     * @Route("/movies", name="app_movies_index",methods="GET")
     */
    public function index(MovieRepository $movieRepository): Response
    {
        $movies = $movieRepository->findBy([],['createdAt' =>'DESC']);

        return $this->render('movies/indexMovies.html.twig', compact('movies'));
    }

     /**
     * @Route("/movies/create", name="app_movies_create", methods="GET|POST")
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $movie = new Movie;
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->persist($movie);
            $em->flush();

            $this->addFlash('success', 'Le film a été créé avec succès');

            return $this->redirectToRoute('app_movies_index');

        }

        return $this->render('movies/createMovies.html.twig',[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/movies/{id<[0-9]+>}", name="app_movies_show",methods="GET")
     */
    public function show(Movie $movie): Response

    {
        return $this->render('movies/showMovies.html.twig.', compact('movie'));
    }

     /**
     * @Route("/movies/{id<[0-9]+>}/edit", name="app_movies_edit",methods="GET|PUT")
     */
    public function edit(Request $request,Movie $movie, EntityManagerInterface $em): Response

    {
        $form = $this->createForm(MovieType::class, $movie, [
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->flush();

            $this->addFlash('success', 'Le film a été modifié avec succès');

            return $this->redirectToRoute('app_movies_index');

        }
        return $this->render('movies/editMovies.html.twig.', [
            'movie' => $movie,
            'form' => $form->createView()
        ]);

        
    }    
      /**
     * @Route("/movies/{id<[0-9]+>}", name="app_movies_delete",methods="DELETE")
     */
    public function delete(Request $request,Movie $movie, EntityManagerInterface $em): Response

    { 
        $token = $request->request->get('csrf_token');

        if ($this->isCsrfTokenValid('movie_deletion_' . $movie->getId(), $token)){

            $em->remove($movie);
            $em->flush();

            $this->addFlash('info', 'Le film a été supprimé avec succès');

        }
           

            return $this->redirectToRoute('app_movies_index');

        }
}