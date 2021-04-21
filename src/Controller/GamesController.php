<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Search\GameSearch;
use App\Form\GameSearchType;
use App\Form\GameType;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\isCsrfTokenValid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\denyAccessUnlessGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class GamesController extends AbstractController
{
    /**
     * @var GameRepository
     */

    private $repository;

    /**
     * @var EntityManagerInterface
     */

    private $em;

    public function __construct(GameRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/games", name="app_games_index",methods="GET")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $search = new GameSearch();
        $form = $this->createForm(GameSearchType::class, $search);
        $form->handleRequest($request);

        $games = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page',1),
            6
        );

        return $this->render('games/indexGames.html.twig', [
            'current_menu' => 'games',
            'games' =>$games,
            'form' => $form->createView()
        ]);
    }

    
     /**
     * @Route("/games/create", name="app_games_create", methods="GET|POST")
     * @Security("is_granted('ROLE_USER')")
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $game = new Game;
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $game->setUser($this->getUser());
            $em->persist($game);
            $em->flush();

            $this->addFlash('success', 'Le jeu a été créé avec succès');

            return $this->redirectToRoute('app_games_index');

        }

        return $this->render('games/createGames.html.twig',[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/games/{id<[0-9]+>}", name="app_games_show",methods="GET")
     */
    public function show(Game $game): Response

    {
        return $this->render('games/showGames.html.twig.', compact('game'));
    }

     /**
     * @Route("/games/{id<[0-9]+>}/edit", name="app_games_edit",methods="GET|PUT")
     * @Security("is_granted('ROLE_USER') && game.getUser() == user")
     */
    public function edit(Request $request,Game $game, EntityManagerInterface $em): Response

    {
        $form = $this->createForm(GameType::class, $game, [
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->flush();

            $this->addFlash('success', 'Le jeu a été modifié avec succès');

            return $this->redirectToRoute('app_games_index');

        }
        return $this->render('games/editGames.html.twig.', [
            'game' => $game,
            'form' => $form->createView()
        ]);

        
    }    
      /**
     * @Route("/games/{id<[0-9]+>}/delete", name="app_games_delete",methods="DELETE")
     * @Security("is_granted('ROLE_USER') && game.getUser() == user")
     */
    public function delete(Request $request,Game $game, EntityManagerInterface $em): Response

    { 
        $token = $request->request->get('csrf_token');

        if ($this->isCsrfTokenValid('game_deletion_' . $game->getId(), $token)){

            $em->remove($game);
            $em->flush();

            $this->addFlash('info', 'Le jeu a été supprimé avec succès');

        }
           

            return $this->redirectToRoute('app_games_index');

        }
        
   }