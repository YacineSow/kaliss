<?php

namespace App\Controller;
use App\Entity\Depot;
use App\Entity\Compte;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */

class DepotController extends AbstractController
{
    /**
     * @Route("/transaction", name="transaction")
     */
    public function index()
    {
        return $this->render('transaction/index.html.twig', [
            'controller_name' => 'TransactionController',
        ]);
    }

     /**
     * @Route("/depots", name="add_depot", methods={"POST"})

     */
    public function addDepot (Request $request,  EntityManagerInterface $entityManager)
    {
        $values = json_decode($request->getContent());
        if(isset($values->montant)) {
            $depot = new Depot();
            if(($values->montant)>=75000){
                $depot->setMontant($values->montant);
                $depot->setDate(new \DateTime());
                //recuperation de l'id du compte
                $repo=$this->getDoctrine()->getRepository(Compte::class);
                $comptes=$repo->find($values->compte);
                $depot->setCompte($comptes);
    
                //incrementant du solde du compte
                $comptes->setSolde($comptes->getSolde()+$values->montant);
    
    
                //enregistrement au niveau du compte
                $entityManager->persist($comptes);
    
                //enregistrement au niveau du depot
                $entityManager->persist($depot);
                $entityManager->flush();
    
                $data = [
                    'status' => 201,
                    'message' => 'Le depot  a été enregistré'
                ];
    
                return new JsonResponse($data, 201);

                $data1 = [
                    'status' => 500,
                    'message' => 'Vous devez renseigner les champs montants et idcompte'
                ];
                return new JsonResponse($data, 500);
            }
            else{
                echo 'Le montant doit etre superieur à 75000';
            }
        }


    }
     

}