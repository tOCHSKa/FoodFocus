<?php

namespace App\Entity;

use App\Repository\SuiviQuotidienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SuiviQuotidienRepository::class)]
class SuiviQuotidien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    #[Assert\Positive()]
    private ?int $calories_calculees = null;

    #[ORM\Column]
    #[Assert\Positive()]
    #[Assert\NotBlank()]
    private ?int $poids_du_jour = null;

    #[ORM\ManyToOne(inversedBy: 'suiviQuotidiens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $id_utilisateur = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getCaloriesCalculees(): ?int
    {
        return $this->calories_calculees;
    }

    public function setCaloriesCalculees(int $calories_calculees): static
    {
        $this->calories_calculees = $calories_calculees;

        return $this;
    }

    public function getPoidsDuJour(): ?int
    {
        return $this->poids_du_jour;
    }

    public function setPoidsDuJour(int $poids_du_jour): static
    {
        $this->poids_du_jour = $poids_du_jour;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateur
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?Utilisateur $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }



   

}
