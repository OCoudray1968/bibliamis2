<?php

namespace App\Controller;

use App\Entity\Loanning;
use App\Form\BookSearchType;
use App\Form\LoanningType;
use App\Repository\BookRepository;
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
     * @Route("/loanning", name="app_loanning_index")
     */
    public function index(LoanningRepository $repository, BookRepository $book,  Request $request):Response
    {
        $loan = new Loanning();

                  return $this->render('loanning/index.html.twig', [
                     'loans' => $repository->findAll(),
                      'book' => $book->findOneBy((array)$loan->getId()),


        ]);
    }
}
