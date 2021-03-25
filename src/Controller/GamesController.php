<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\GameType;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
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
     * @Route("/games", name="app_games_index",methods="GET")
     */
    public function index(GameRepository $gameRepository): Response
    {
        $games = $gameRepository->findBy([],['createdAt' =>'DESC']);

        return $this->render('games/indexGames.html.twig', compact('games'));
    }

    
     /**
     * @Route("/games/create", name="app_games_create", methods="GET|POST")
     * @Security("is_granted('ROLE_USER') && user.isVerified()")
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
     * @Security("is_granted('ROLE_USER') && user.isVerified() && game.getUser() == user")
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
     * @Security("is_granted('ROLE_USER') && user.isVerified() && game.getUser() == user")
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