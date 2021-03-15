<?php

namespace App\Controller;

use App\Entity\Disc;
use App\Form\DiscType;
use App\Repository\DiscRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DiscsController extends AbstractController
{
    /**
     * @Route("/discs", name="app_discs_index",methods="GET")
     */
    public function index(DiscRepository $discRepository): Response
    {
        $discs = $discRepository->findBy([],['createdAt' =>'DESC']);

        return $this->render('discs/indexDiscs.html.twig', compact('discs'));
    }

     /**
     * @Route("/discs/create", name="app_discs_create", methods="GET|POST")
     */
    public function create(Request $request, EntityManagerInterface $em):Response
    {
        $disc = new Disc;
        $form = $this->createForm(DiscType::class, $disc);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $disc->setUser($this->getUser());
            $em->persist($disc);
            $em->flush();

            $this->addFlash('success', 'Le disque a été créé avec succès');

            return $this->redirectToRoute('app_discs_index');

        }

        return $this->render('discs/createDiscs.html.twig',[
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/discs/{id<[0-9]+>}", name="app_discs_show",methods="GET")
     */
    public function show(Disc $disc): Response

    {
        return $this->render('discs/showDiscs.html.twig.', compact('disc'));
    }

     /**
     * @Route("/discss/{id<[0-9]+>}/edit", name="app_discs_edit",methods="GET|PUT")
     */
    public function edit(Request $request,Disc $disc, EntityManagerInterface $em): Response

    {
        $form = $this->createForm(DiscType::class, $disc, [
            'method' => 'PUT'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em->flush();

            $this->addFlash('success', 'Le disque a été modifié avec succès');

            return $this->redirectToRoute('app_discs_index');

        }
        return $this->render('discs/editDiscs.html.twig.', [
            'disc' => $disc,
            'form' => $form->createView()
        ]);

        
    }    
      /**
     * @Route("/discs/{id<[0-9]+>}", name="app_discs_delete",methods="DELETE")
     */
    public function delete(Request $request,Disc $disc, EntityManagerInterface $em): Response

    { 
        $token = $request->request->get('csrf_token');

        if ($this->isCsrfTokenValid('disc_deletion_' . $disc->getId(), $token)){

            $em->remove($disc);
            $em->flush();

            $this->addFlash('info', 'Le disque a été supprimé avec succès');

        }
           

            return $this->redirectToRoute('app_discs_index');

        }
}
