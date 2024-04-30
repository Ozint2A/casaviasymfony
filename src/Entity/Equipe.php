<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_debut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heure_fin = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $debut_pause = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fin_pause = null;

    /**
     * @var Collection<int, UtilisateurEquipe>
     */
    #[ORM\OneToMany(targetEntity: UtilisateurEquipe::class, mappedBy: 'equipe')]
    private Collection $utilisateurEquipes;

    public function __construct()
    {
        $this->utilisateurEquipes = new ArrayCollection();
    }

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

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->heure_debut;
    }

    public function setHeureDebut(\DateTimeInterface $heure_debut): static
    {
        $this->heure_debut = $heure_debut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->heure_fin;
    }

    public function setHeureFin(\DateTimeInterface $heure_fin): static
    {
        $this->heure_fin = $heure_fin;

        return $this;
    }

    public function getDebutPause(): ?\DateTimeInterface
    {
        return $this->debut_pause;
    }

    public function setDebutPause(?\DateTimeInterface $debut_pause): static
    {
        $this->debut_pause = $debut_pause;

        return $this;
    }

    public function getFinPause(): ?\DateTimeInterface
    {
        return $this->fin_pause;
    }

    public function setFinPause(?\DateTimeInterface $fin_pause): static
    {
        $this->fin_pause = $fin_pause;

        return $this;
    }

    /**
     * @return Collection<int, UtilisateurEquipe>
     */
    public function getUtilisateurEquipes(): Collection
    {
        return $this->utilisateurEquipes;
    }

    public function addUtilisateurEquipe(UtilisateurEquipe $utilisateurEquipe): static
    {
        if (!$this->utilisateurEquipes->contains($utilisateurEquipe)) {
            $this->utilisateurEquipes->add($utilisateurEquipe);
            $utilisateurEquipe->setEquipe($this);
        }

        return $this;
    }

    public function removeUtilisateurEquipe(UtilisateurEquipe $utilisateurEquipe): static
    {
        if ($this->utilisateurEquipes->removeElement($utilisateurEquipe)) {
            // set the owning side to null (unless already changed)
            if ($utilisateurEquipe->getEquipe() === $this) {
                $utilisateurEquipe->setEquipe(null);
            }
        }

        return $this;
    }


    public function getFullName(): string
    {
        $fullName = '';
    
        // Ajout du nom de l'équipe
        $fullName .= $this->getNom();
    
        // Formatage de l'heure de début si elle est définie
        if ($this->heure_debut instanceof \DateTimeInterface) {
            $fullName .= '  -  ' . $this->heure_debut->format('H:i');
        }
    
        // Formatage de l'heure de fin si elle est définie
        if ($this->heure_fin instanceof \DateTimeInterface) {
            $fullName .= '  -  ' . $this->heure_fin->format('H:i');
        }
    
        // Formatage de l'heure de début de pause si elle est définie
        if ($this->debut_pause instanceof \DateTimeInterface) {
            $fullName .= '  /  ' . $this->debut_pause->format('H:i');
        }
    
        // Formatage de l'heure de fin de pause si elle est définie
        if ($this->fin_pause instanceof \DateTimeInterface) {
            $fullName .= '  -  ' . $this->fin_pause->format('H:i');
        }
    
        return $fullName;
    }
    

}
