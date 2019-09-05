<?php

namespace App\Controller;

use App\Entity\Depot;
use App\Entity\Compte;
use App\Form\CompteType;
use App\Form\DepotType;
use App\Repository\DepotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class DepotController extends AbstractController
{
    /**
     * @Route("/", name="depot_index", methods={"GET"})
     */
    public function index(DepotRepository $depotRepository): Response
    {
        return $this->render('depot/index.html.twig', [
            'depots' => $depotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/depot", name="depot_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $depot = new Depot();
        $comptes = new Compte();
        $values=$request->request->all();
        if(($values["montant"])>=75000){
            $form = $this->createForm(DepotType::class, $depot);
            $form1 = $this->createForm(CompteType::class, $comptes);
            $form->handleRequest($request);
            $form1->handleRequest($request);
            $form->submit($values);
            $form1->submit($values);
    
            if ($form->isSubmitted()) {
                $depot->setDate(new \DateTime());

                $entityManager = $this->getDoctrine()->getManager();
                // $entityManager->persist($depot);
                // $entityManager->flush();


                //recuperation de l'id du compte
            $repo=$this->getDoctrine()->getRepository(Compte::class);
            $comptes=$repo->findOneBy(['numcompte' => $comptes->getNumcompte()] );
            $depot->setCompte($comptes);

                //  $entityManager->persist($depot);
                //  $entityManager->flush();

                //incrementant du solde du compte
                $comptes->setSolde($comptes->getSolde()+$values["montant"]);

                //enregistrement au niveau du compte
                $entityManager->persist($comptes);

                //enregistrement au niveau du depot
               $entityManager->persist($depot);
                $entityManager->flush();
    
                $data = [
                    'statu' => 201,
                    'messag' => 'Le depot a été effectué'
                ];
        
                return new JsonResponse($data, 201);
            }
        }


        $data = [
            'statu' => 500,
            'messag' => 'le montant doit etre superieur a 75000'
        ];

        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/{id}", name="depot_show", methods={"GET"})
     */
    public function show(Depot $depot): Response
    {
        return $this->render('depot/show.html.twig', [
            'depot' => $depot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="depot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Depot $depot): Response
    {
        $form = $this->createForm(DepotType::class, $depot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('depot_index');
        }

        return $this->render('depot/edit.html.twig', [
            'depot' => $depot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="depot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Depot $depot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($depot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('depot_index');
    }
}
