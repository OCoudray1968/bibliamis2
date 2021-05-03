<?php

namespace App\Controller;

use App\Entity\Loanning;
use App\Entity\Movie;
use App\Entity\Search\MovieSearch;
use App\Form\MovieSearchType;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\isCsrfTokenValid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\denyAccessUnlessGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class MoviesController extends AbstractController
{
    /**
     * @var MovieRepository
     */

    private $repository;

    /**
     * @var EntityManagerInterface
     */

    private $em;

    public function __construct(MovieRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
     /**
     * @Route("/movies", name="app_movies_index",methods="GET")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new MovieSearch();
        $form = $this->createForm(MovieSearchType::class, $search);
        $form->handleRequest($request);

        $movies = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page',1),
            6
        );

        return $this->render('movies/indexMovies.html.twig', [
            'current_menu' => 'movies',
            'movies' =>$movies,
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/movies/create", name="app_movies_create", methods="GET|POST")
     * @Security("is_granted('ROLE_USER')")
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $movie = new Movie;
        $form = $this->createForm(MovieType::class, $movie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $movie->setUser($this->getUser());
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
     * @Security("is_granted('ROLE_USER') && movie.getUser() == user")
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
     * @Route("/movies/{id<[0-9]+>}/delete", name="app_movies_delete",methods="DELETE")
     * @Security("is_granted('ROLE_USER') && movie.getUser() == user")
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

    /**
     * @Route("/movies/{id<[0-9]+>}/loan", name="app_movies_loan",methods="GET")
     */
    public function loan(Request $request, Movie $movie):Response

    {
        $user = $this->getUser();
        $loan = new Loanning();
        $loan->setBorrower($user);
        $loan->setLender($movie->getUser());
        $loan->setOngoing(true);
        $loan->setMovie($movie);
        $loan->updateLoanDate();

        $this->em->persist($loan);

        $this->em->flush();

        $this->addFlash('success', 'La demande de prêt a été envoyé avec succès');

        return $this->redirectToRoute('app_movies_index');




    }
}
