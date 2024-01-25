<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle_produit = null;

    #[ORM\Column(length: 30)]
    private ?string $type_produit = null;

    #[ORM\Column(nullable: true)]
    private ?int $proteines = null;

    #[ORM\Column(nullable: true)]
    private ?int $glucides = null;

    #[ORM\Column(nullable: true)]
    private ?int $lipides = null;

    #[ORM\Column]
    private ?int $calories_produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleProduit(): ?string
    {
        return $this->libelle_produit;
    }

    public function setLibelleProduit(string $libelle_produit): static
    {
        $this->libelle_produit = $libelle_produit;

        return $this;
    }

    public function getTypeProduit(): ?string
    {
        return $this->type_produit;
    }

    public function setTypeProduit(string $type_produit): static
    {
        $this->type_produit = $type_produit;

        return $this;
    }

    public function getProteines(): ?int
    {
        return $this->proteines;
    }

    public function setProteines(?int $proteines): static
    {
        $this->proteines = $proteines;

        return $this;
    }

    public function getGlucides(): ?int
    {
        return $this->glucides;
    }

    public function setGlucides(?int $glucides): static
    {
        $this->glucides = $glucides;

        return $this;
    }

    public function getLipides(): ?int
    {
        return $this->lipides;
    }

    public function setLipides(?int $lipides): static
    {
        $this->lipides = $lipides;

        return $this;
    }

    public function getCaloriesProduit(): ?int
    {
        return $this->calories_produit;
    }

    public function setCaloriesProduit(int $calories_produit): static
    {
        $this->calories_produit = $calories_produit;

        return $this;
    }
}
