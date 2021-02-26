<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscsController extends AbstractController
{
    /**
     * @Route("/discs", name="discs")
     */
    public function index(): Response
    {
        return $this->render('discs/index.html.twig', [
            'controller_name' => 'DiscsController',
        ]);
    }
}
