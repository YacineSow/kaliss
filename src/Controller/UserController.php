<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Compte;
use App\Entity\Profil;
use App\Form\UserType;
use App\Entity\Partenaire;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
    public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager)
    {
       
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        $values=$request->request->all();
        $form->submit($values);
        
        $file=$request->files->all()['imageName'];

        if ($form->isSubmitted() ) {
            $user->setPassword(
                $passwordEncoder->encodePassword(
                $user,
                $form->get('password')->getData()

            ));
            

            $user->setImageFile($file);
            
            $repos=$this->getDoctrine()->getRepository(Profil::class);
            $profils=$repos->find($values['profil']);
            $user->setProfil($profils);

            if($profils->getLibelle() == "admin"){
                $user->setRoles(["ROLE_ADMIN"]);  
            }
            elseif($profils->getLibelle() == "caissiere"){
                $user->setRoles(["ROLE_CAISSIERE"]);
            }
            elseif($profils->getLibelle() == "user"){
                $user->setRoles(["ROLE_USER"]);
            }
            
            $user->setStatut("debloquer");

            $repos=$this->getDoctrine()->getRepository(Partenaire::class);
            $partenaire=$repos->find($values['partenaire']);
            $user->setPartenaire($partenaire);                
            // $this->getUser()->getPartenaire();
                // var_dump($this->getUser());
                // die();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
    
                $data = [
                    'statu' => 201,
                    'messag' => 'L\'utilisateur a été créé'
                ];
        
                return new JsonResponse($data, 201);
        }
        $data = [
            'statu' => 500,
            'messag' => 'Erreur lors de l\'insertion'
        ];

        return new JsonResponse($data, 500);

      
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