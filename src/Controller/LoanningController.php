<?php

namespace App\Controller;

use App\Entity\Loanning;
use App\Form\LoanningType;
use App\Repository\LoanningRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoanningController extends AbstractController
{
    /**
     * @var LoanningRepository
     */

    private $repository;

    /**
     * @var EntityManagerInterface
     */

    private $em;

    public function __construct(LoanningRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
    /**
     * @Route("/loanning", name="app_loanning_index")
     */
    public function index(Request $request, UserRepository $user):Response
    {

        $loan = new Loanning;

        $loan->setLender()->getLender($user);
        $loan->setOngoing(true);
        dd($loan);
        $this->em->persist($loan);
        // $this->em->flush();

            $this->addFlash('success', "La demande d'emprunt a été envoyé avec succès");

            return $this->redirectToRoute('app_loanning_index');


    }
}
