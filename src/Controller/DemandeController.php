<?php

namespace App\Controller;

use App\Entity\Demande;
use App\Form\DemandeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class DemandeController extends AbstractController
{
        /**
 * @Route("/demande", name="app_demande")
 * Method({"GET", "POST"})
 */
 public function new(ManagerRegistry  $doctrine, Request $request, SluggerInterface  $slugger,MailerInterface $mailer) {
    $demande= new Demande();
    $Cls= $doctrine->getManager() ;
    $form=$this->createForm(DemandeType::class,$demande);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {
      $brochureFile = $form->get('cv')->getData();

      // this condition is needed because the 'brochure' field is not required
      // so the PDF file must be processed only when a file is uploaded
      if ($brochureFile) {
          $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
          // this is needed to safely include the file name as part of the URL
          $safeFilename = $slugger->slug($originalFilename);
          $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

          // Move the file to the directory where brochures are stored
          try {
              $brochureFile->move(
                  $this->getParameter('persone_image'),
                  $newFilename
              );
          } catch (FileException $e) {
              // ... handle exception if something happens during file upload
          }

          // updates the 'brochureFilename' property to store the PDF file name
          // instead of its contents
          $demande->setCv($newFilename);
      }
     $demande = $form->getData();
     $moy1=$demande->getMoyenneG3eme();
     $moy2=$demande->getMoyenneG4eme();
    
     $score = ($moy1+$moy2)/2 ; 
     $demande->setScore($score);
     if($score>15){
        $demande->setEtat("Pré-Selectionné");
     }else{
        $demande->setEtat("Refusé");
     }
     
     $entityManager = $doctrine->getManager();
     
     $entityManager->persist($demande);
     $entityManager->flush();
    
     return $this->redirectToRoute('app_ecole');
    }
    return $this->render('demande/index.html.twig',['form' => $form->createView()]);
 
   

}
}
