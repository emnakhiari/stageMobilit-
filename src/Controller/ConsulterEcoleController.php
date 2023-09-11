<?php

namespace App\Controller;

use App\Entity\EcolePartenaire;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConsulterEcoleController extends AbstractController
{
    #[Route('/consulter/ecole', name: 'app_consulter_ecole')]
    public function index(ManagerRegistry $doctrine): Response

    {
        $d=$doctrine->getRepository(EcolePartenaire ::class)->findAll();

        return $this->render('consulter_ecole/index.html.twig', [
            'all' => $d,
        ]);
    }
}
