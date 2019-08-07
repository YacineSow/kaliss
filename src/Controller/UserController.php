<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $values=$request->request->all();
        $form->submit($values);
        $form->handleRequest($request);

        $repo=$this->getDoctrine()->getRepository(Partenaire::class);
        $partenaires=$repo->find($values->partenaire);
        $user->setPartenaire($partenaires);
        
        $repos=$this->getDoctrine()->getRepository(Profil::class);
        $profils=$repos->find($values->profil);
        $user->setProfil($profils);
        $role=[];
        if($profils->getLibelle() == "admin"){
          $role=["ROLE_ADMIN"];  
        }
        elseif($profils->getLibelle() == "caissiere"){
            $role=["ROLE_CAISSIERE"];
        }
        elseif($profils->getLibelle() == "user"){
            $role=["ROLE_USER"];
        }
        $user->setRoles($role);

        $repos=$this->getDoctrine()->getRepository(Compte::class);
        $compte=$repos->find($values->compte);
        $user->setCompte($compte);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();


        

        return new Response('Utilisateur creer');
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
