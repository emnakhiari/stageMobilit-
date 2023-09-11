<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Entity\User;
use App\Form\RechercheType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminLController extends AbstractController
{
    #[Route('/Admin/supprimer/{id}', name: 'app_AdminSupprimer')]
    public function supprimerClasse(ManagerRegistry $doctrine, $id): Response
    {
         
          $cls=$doctrine->getRepository(User ::class)->find($id);
          $d=$doctrine->getManager();
        
            
            $d->remove($cls);
            $d->flush();

          
            
      
       
          return $this->redirectToRoute('app_admin', [
            'id' => $cls->getId()
        ]);

      
    }


    #[Route('/Admin/bloquer/{id}', name: 'app_AdminBloquer')]
    public function BloquerClasse(ManagerRegistry $doctrine, $id): Response
    {
          $d=$doctrine->getManager();
          $cls=$doctrine->getRepository(User ::class)->find($id);
         $cls->setType('bloquer');
         $cls->setRoles(['ROLE_BLOQUER']);
        
            
           
            $d->flush();

          
            
      
       
          return $this->redirectToRoute('app_admin', [
            'id' => $cls->getId()
        ]);

      
    }

    #[Route('/Admin/debloquer/{id}', name: 'app_AdminBloquerde')]
    public function DeBloquerClasse(ManagerRegistry $doctrine, $id): Response
    {
          $d=$doctrine->getManager();
          $cls=$doctrine->getRepository(User ::class)->find($id);
         $cls->setType('debloquer');
         $cls->setRoles(['ROLE_USER']);
        
            
           
            $d->flush();

          
            
      
       
          return $this->redirectToRoute('app_admin', [
            'id' => $cls->getId()
        ]);

      
    }

    #[Route('/admin', name: 'app_admin')]
    public function recherche(ManagerRegistry $doctrine,Request $req): Response
    {
         
        $cls= new User();
     
          $d=$doctrine->getRepository(Demande :: class)->findAll();
        
          $user = [];
        
          $s = null ; 
          $em=$doctrine->getRepository(Demande :: class)->findAll();
          
            
              
      return $this->render('adminUser/index.html.twig', [ 'em'=>$em  ]);

      
    }
}
