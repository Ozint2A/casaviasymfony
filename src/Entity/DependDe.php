<?php

namespace App\Entity;

use App\Repository\DependDeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DependDeRepository::class)]
class DependDe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Utilisateur $chef = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Utilisateur $employe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChef(): ?Utilisateur
    {
        return $this->chef;
    }

    public function setChef(?Utilisateur $chef): static
    {
        $this->chef = $chef;

        return $this;
    }

    public function getEmploye(): ?Utilisateur
    {
        return $this->employe;
    }

    public function setEmploye(?Utilisateur $employe): static
    {
        $this->employe = $employe;

        return $this;
    }
}
