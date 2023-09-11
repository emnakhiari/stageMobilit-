<?php

namespace App\Controller;

use App\Entity\EcolePartenaire;

use App\Form\EPType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\String\Slugger\SluggerInterface;

class EcoleController extends AbstractController
{
    #[Route('/ecole', name: 'app_ecole1')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $d=$doctrine->getRepository(EcolePartenaire ::class)->findAll();
        return $this->render('ecole/index.html.twig', [
            'all' => $d,
        ]);
    }
   
  
    #[Route('/', name: 'app_ecole')]
    public function index1(ManagerRegistry $doctrine): Response
    {
        $d=$doctrine->getRepository(EcolePartenaire ::class)->findAll();

        return $this->render('baseFront.html.twig', [
            'all' => $d,
        ]);
    }
  
  
   
        /**
 * @Route("/AjouterEcole1", name="app_AEcole")
 * Method({"GET", "POST"})
 */
 public function new12(ManagerRegistry  $doctrine, Request $request, SluggerInterface  $slugger,MailerInterface $mailer) {
    $demande= new EcolePartenaire();
    $Cls= $doctrine->getManager() ;
    $form=$this->createForm(EPType::class,$demande);
    $form->handleRequest($request);
    if($form->isSubmitted() && $form->isValid()) {
        $brochureFile = $form->get('image')->getData();

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
            $demande->setImage($newFilename);
        }
     $demande = $form->getData();
     $entityManager = $doctrine->getManager();
     
     $entityManager->persist($demande);
     $entityManager->flush();
    
   
    }
    return $this->render('ecole/AjouterEcole.html.twig',['form' => $form->createView()]);
 
   

}
}
