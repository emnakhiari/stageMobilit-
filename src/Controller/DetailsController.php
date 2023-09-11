<?php

namespace App\Controller;

use App\Entity\EcolePartenaire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    #[Route('/details', name: 'app_details')]
    public function index(): Response
    {
        return $this->render('details/index.html.twig', [
            'controller_name' => 'DetailsController',
        ]);
    }
    #[Route('/details/{nom}', name: 'app_ecolem')]
    public function indexm($nom,ManagerRegistry $doctrine): Response
    {
        $d=$doctrine->getRepository(EcolePartenaire ::class)->findAll();
        return $this->render('details/index.html.twig', [
            'name' => $nom , 'd' => $d
            
        ]);
    }
}
