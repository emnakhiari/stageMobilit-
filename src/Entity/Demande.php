<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $EmailEtudiant = null;

    #[ORM\Column(length: 255)]
    private ?string $EcoleP = null;

    #[ORM\Column(length: 255)]
    private ?string $Departement = null;

    #[ORM\Column(type : "float" , nullable : true)]
    private ?string $MoyenneG3eme = null;

    #[ORM\Column(type : "float" , nullable : true)]
    private ?string $MoyenneG4eme = null;

    #[ORM\Column(type : "float" , nullable : true)]
    private ?string $score = null;

    #[ORM\Column(length: 65535)]
    private $cv;

    public function getCv(): ?int
    {
        return $this->cv;
    }
    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }



 
    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEtudiant(): ?string
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant(string $idEtudiant): self
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    public function getEmailEtudiant(): ?string
    {
        return $this->EmailEtudiant;
    }

    public function setEmailEtudiant(string $EmailEtudiant): self
    {
        $this->EmailEtudiant = $EmailEtudiant;

        return $this;
    }

    public function getEcoleP(): ?string
    {
        return $this->EcoleP;
    }

    public function setEcoleP(string $EcoleP): self
    {
        $this->EcoleP = $EcoleP;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->Departement;
    }

    public function setDepartement(string $Departement): self
    {
        $this->Departement = $Departement;

        return $this;
    }

    public function getMoyenneG3eme(): ?string
    {
        return $this->MoyenneG3eme;
    }

    public function setMoyenneG3eme(string $MoyenneG3eme): self
    {
        $this->MoyenneG3eme = $MoyenneG3eme;

        return $this;
    }

    public function getMoyenneG4eme(): ?string
    {
        return $this->MoyenneG4eme;
    }

    public function setMoyenneG4eme(string $MoyenneG4eme): self
    {
        $this->MoyenneG4eme = $MoyenneG4eme;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
