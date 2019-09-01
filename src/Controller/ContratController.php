<?php

namespace App\Controller;

use Dompdf\Dompdf;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContratController extends AbstractController
{
    /**
     * @Route("/contrat", name="contrat")
     */
    public function index()
    {
        $dompdf=new Dompdf();
       $dompdf->loadhtml("
       <h1>bonjour</h1>
       ");
       $dompdf->setPaper("A4","portrait");
       $dompdf->render();
       $dompdf->stream();
    }
}
