<?php

namespace App\Controller;

use App\Repository\PartenaireRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListePartenaireController extends AbstractController
{
    /**
     * @Route("/liste/partenaire", name="liste_partenaire", methods={"GET"})
     */
    public function index(PartenaireRepository $partenaireRepository, SerializerInterface $serializer)
    {
        $partenaires = $partenaireRepository->findAll();
        $data = $serializer->serialize($partenaires, 'json');

        return new Response($data, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}
