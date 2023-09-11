<?php

namespace App\Entity;

use App\Repository\EcolePartenaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EcolePartenaireRepository::class)]
class EcolePartenaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(length: 255)]
    private ?int $id = null;

    #[ORM\Column(length: 65535)]
    private  $nom ;

    #[ORM\Column(length: 65535)]
    private  $email;


    #[ORM\Column(length: 65535)]
    private $image;

    #[ORM\Column(length: 65535)]
    private $description;

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setDescription(string $description): self
    {
        $this->description= $description;

        return $this;
    }
  
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setImage(string $email): self
    {
        $this->image = $email;

        return $this;
    }
  

    public function getNom(): ?string
    {
        return $this->nom;
    }

  

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getId(): ?string
    {
        return $this->id;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
