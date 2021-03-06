<?php

namespace App\Controller;

use App\Form\UserFormType;
use App\Form\ChangePasswordFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountController extends AbstractController
{

    /**
     * @Route("/account", name="app_account_index",methods="GET")
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('account/indexAccount.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }
    /**
     * @Route("/account", name="app_account", methods="GET")
     * @IsGranted("ROLE_USER")
     */
    public function show(): Response
    {
           
        return $this->render('account/show.html.twig');
    }

   /**
     * @Route("/account/edit", name="app_account_edit", methods={"GET","PATCH"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function edit(Request $request, EntityManagerInterface $em): Response
    {
        
    	$user = $this->getUser();	
    	$form = $this->createForm(UserFormType::class, $user, [
            'method' => 'PATCH'
        ]);

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$em->flush();

    		$this->addFlash('success', 'Mise à jour du compte éffectuée !' );

    		return $this->redirectToRoute('app_account');

    	}

        return $this->render('account/edit.html.twig', [
         'form' => $form->createView()
     	]);
    }
    /**
     * @Route("/account/change-password", name="app_account_change_password", methods={"GET","PATCH"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
public function changePassword(Request $request, EntityManagerInterface $em,
	 UserPasswordEncoderInterface $passwordEncoder): Response
    {

    	$user = $this->getUser();	
    	$form = $this->createForm(ChangePasswordFormType::class, null, [
    		'current_password_is_required' => true,
            'method' => 'PATCH'
        ]);

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$user->setPassword(
    			$passwordEncoder->encodePassword($user, $form['plainPassword']->getData())
    		);
    		$em->flush();

    		$this->addFlash('success', 'Mise à jour du mot de passe éffectuée !' );

    		return $this->redirectToRoute('app_account');

    	}
        return $this->render('account/change_password.html.twig', [
        	'form' => $form->createView()
        ]);
    }
}
