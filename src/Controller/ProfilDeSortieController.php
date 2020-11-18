<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilDeSortieController extends AbstractController
{
    /**
     * @Route("/profil/de/sortie", name="profil_de_sortie")
     */
    public function index(): Response
    {
        return $this->render('profil_de_sortie/index.html.twig', [
            'controller_name' => 'ProfilDeSortieController',
        ]);
    }
}
