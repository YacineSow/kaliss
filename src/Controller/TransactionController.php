<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Tarifs;
use App\Entity\Expediteur;
use App\Entity\Transaction;
use App\Entity\Beneficiaire;
use App\Form\ExpediteurType;
use App\Form\TransactionType;
use App\Form\BeneficiaireType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class TransactionController extends AbstractController
{
    /**
     * @Route("/", name="transaction_index", methods={"GET"})
     */
    public function index(TransactionRepository $transactionRepository): Response
    {
        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/transaction", name="transaction_new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $expediteur = new Expediteur ();
        $form = $this->createForm(ExpediteurType::class, $expediteur);
        $form->handleRequest($request);
        $values=$request->request->all();
        $form->submit($values);
        
        $beneficiaire= new Beneficiaire ();
        $form = $this->createForm(BeneficiaireType::class, $beneficiaire);
        $form->handleRequest($request);
        $values=$request->request->all();
        $form->submit($values);

    

        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $values=$request->request->all();
        $form->submit($values);
        $form->handleRequest($request);


        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();

            $transaction->setAgence('WARI');
            $transaction->setDatetransaction(new \DateTime());

            $jour = date('d');
            $mois = date('m');
            $annee = date('Y');
            $heure = date('H');
            $minute = date('i');
            $seconde= date('s');
            $tata= date('ma');
            $code=$jour.$mois.$annee.$heure.$minute.$seconde.$tata;

            $transaction->setExpediteur($expediteur);
            $transaction->setBeneficiaire($beneficiaire);
            $transaction->setCodetransaction($code);
            $user=$this->getUser();
            $transaction->setUser($user);

            // recuperer la valeur du frais
           $repository=$this->getDoctrine()->getRepository(Tarifs::class);
           $commission=$repository->findAll();

           //recuperer la valeur du montant saisie
           
            $montant=$transaction->getMontant();
            //var_dump($montant);die();
            //Verifier si le montant est disponible en solde 
            $comptes=$this->getUser()->getCompte();
            if($transaction->getMontant() >= $comptes->getSolde()){
                return $this->json([
                    'message' => 'votre solde( '.$comptes->getSolde().' ) ne vous permez pas d\'effectuer cet envoie'
                ]);
               }
            
               
            // trouver les frais qui correspond au montant
            foreach ($commission as $values ) {
                $values->getBorneinferieure();
                $values->getBornesuperieure();
                $values->getFrais();
                if($montant >= $values->getBorneinferieure() &&  $montant <= $values->getBornesuperieure()){
                    $valeur=$values->getFrais();
                }
            }
           $transaction->setFrais( $valeur);
           $wari=( $valeur*40)/100;
           $partenaire=( $valeur*20)/100;
           $etat=( $valeur*30)/100;

           $comptes->setSolde($comptes->getSolde()-$transaction->getMontant()+ $wari);

           $transaction->setCommissionwari($wari);
           $transaction->setCommissionpartenaire($partenaire);
           $transaction->setCommissionetat($etat);

            $total=$montant+ $values->getFrais();
            $transaction->setTotal($total);

            $entityManager->persist($transaction);
            $entityManager->persist($beneficiaire);
            $entityManager->persist($expediteur);
            $entityManager->flush();

            $data = [
                'statu' => 200,
                'messag' => 'Bienvenue chez Djibyette_Kaliss ' . $expediteur->getPrenomexpediteur() . ' '  . ' ' . $expediteur->getNomexpediteur() . ' vous a envoyé ' . $transaction->getMontant() . ' voici le code de retrait ' . $transaction->getCodetransaction()
            ];
            return new JsonResponse($data);
            
        }

        $data = [
            'statu' => 500,
            'messag' => 'Erreur lors de l\'insertion'
        ];

        return new JsonResponse($data, 500);
    }

    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="transaction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Transaction $transaction): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Transaction $transaction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('transaction_index');
    }
}
