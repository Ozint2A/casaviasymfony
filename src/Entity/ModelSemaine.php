<?php

namespace App\Entity;

use App\Repository\ModelSemaineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModelSemaineRepository::class)]
class ModelSemaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $lundi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $mardi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $mercredi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $jeudi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $vendredi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $samedi = null;

    #[ORM\ManyToOne(cascade:['persist'])]
    private ?Equipe $dimanche = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLundi(): ?Equipe
    {
        return $this->lundi;
    }

    public function setLundi(?Equipe $lundi): static
    {
        $this->lundi = $lundi;

        return $this;
    }

    public function getMardi(): ?Equipe
    {
        return $this->mardi;
    }

    public function setMardi(?Equipe $mardi): static
    {
        $this->mardi = $mardi;

        return $this;
    }

    public function getMercredi(): ?Equipe
    {
        return $this->mercredi;
    }

    public function setMercredi(?Equipe $mercredi): static
    {
        $this->mercredi = $mercredi;

        return $this;
    }

    public function getJeudi(): ?Equipe
    {
        return $this->jeudi;
    }

    public function setJeudi(?Equipe $jeudi): static
    {
        $this->jeudi = $jeudi;

        return $this;
    }

    public function getVendredi(): ?Equipe
    {
        return $this->vendredi;
    }

    public function setVendredi(?Equipe $vendredi): static
    {
        $this->vendredi = $vendredi;

        return $this;
    }

    public function getSamedi(): ?Equipe
    {
        return $this->samedi;
    }

    public function setSamedi(?Equipe $samedi): static
    {
        $this->samedi = $samedi;

        return $this;
    }

    public function getDimanche(): ?Equipe
    {
        return $this->dimanche;
    }

    public function setDimanche(?Equipe $dimanche): static
    {
        $this->dimanche = $dimanche;

        return $this;
    }
    public function getFullDate(){
        $fullDate = '';
    
        if ($this->getLundi()) {
            $fullDate .= "Lundi :  " . $this->getLundi()->getFullName() . "<br>";
        }
    
        if ($this->getMardi()) {
            $fullDate .= "Mardi :  " . $this->getMardi()->getFullName() . "<br>";
        }
    
        if ($this->getMercredi()) {
            $fullDate .= "Mercredi :  " . $this->getMercredi()->getFullName() . "<br>";
        }
    
        if ($this->getJeudi()) {
            $fullDate .= "Jeudi :  " . $this->getJeudi()->getFullName() . "<br>";
        }
    
        if ($this->getVendredi()) {
            $fullDate .= "Vendredi :  " . $this->getVendredi()->getFullName() . "<br>";
        }
    
        if ($this->getSamedi()) {
            $fullDate .= "Samemdi :  " . $this->getSamedi()->getFullName() . "<br>";
        }
    
        if ($this->getDimanche()) {
            $fullDate .= "Dimanche :  " . $this->getDimanche()->getFullName() . "<br>";
        }
    
        return $fullDate;
    }
    public function getFullSemaine(){
        $fullDate = '';
    
        if ($this->getLundi()) {
            $fullDate .= "Lundi :  " . $this->getLundi()->getNom(). "  |  " ;
        }
    
        if ($this->getMardi()) {
            $fullDate .= "Mardi :  " . $this->getMardi()->getNom(). "  |  " ;
        }
    
        if ($this->getMercredi()) {
            $fullDate .= "Mercredi :  " . $this->getMercredi()->getNom(). "  |  ";
        }
    
        if ($this->getJeudi()) {
            $fullDate .= "Jeudi :  " . $this->getJeudi()->getNom(). "  |  ";
        }
    
        if ($this->getVendredi()) {
            $fullDate .= "Vendredi :  " . $this->getVendredi()->getNom(). "  |  ";
        }
    
        if ($this->getSamedi()) {
            $fullDate .= "Samedi :  " . $this->getSamedi()->getNom(). "  |  ";
        }
    
        if ($this->getDimanche()) {
            $fullDate .= "Dimanche :  " . $this->getDimanche()->getNom(). "   ";
        }
    
        return $fullDate;
    }
    
    
    
    
}
