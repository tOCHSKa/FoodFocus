<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;



#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity('email')]
class Utilisateur implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank()]
    private ?string $avatar = null;

    #[ORM\Column(length: 254, unique: true)]
    #[Assert\NotBlank()]
    #[Assert\Email()]
    private ?string $email = null;

    #[ORM\Column(length: 300)]
    #[Assert\NotBlank()]
    private ?string $password = null;

    #[ORM\Column(length: 1)]
    #[Assert\NotBlank()]
    private ?string $sexe = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank()]
    private ?string $nom = null;

    #[ORM\Column(length: 15)]
    #[Assert\NotBlank()]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank()]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[Assert\LessThan(250)]
    private ?int $taille = null;

    #[ORM\Column]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    #[Assert\LessThan(5)]
    private ?int $taux_activité_physique = null;

    #[ORM\OneToMany(mappedBy: 'id_utilisateur', targetEntity: SuiviQuotidien::class)]
    private Collection $suiviQuotidiens;

    public function __construct()
    {
        $this->suiviQuotidiens = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }



    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

        return $this;
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

    public function getPrénom(): ?string
    {
        return $this->prenom;
    }

    public function setPrénom(string $prénom): static
    {
        $this->prenom = $prénom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getTauxActivitéPhysique(): ?int
    {
        return $this->taux_activité_physique;
    }

    public function setTauxActivitéPhysique(int $taux_activité_physique): static
    {
        $this->taux_activité_physique = $taux_activité_physique;

        return $this;
    }

    /**
     * @return Collection<int, SuiviQuotidien>
     */
    public function getSuiviQuotidiens(): Collection
    {
        return $this->suiviQuotidiens;
    }

    public function addSuiviQuotidien(SuiviQuotidien $suiviQuotidien): static
    {
        if (!$this->suiviQuotidiens->contains($suiviQuotidien)) {
            $this->suiviQuotidiens->add($suiviQuotidien);
            $suiviQuotidien->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeSuiviQuotidien(SuiviQuotidien $suiviQuotidien): static
    {
        if ($this->suiviQuotidiens->removeElement($suiviQuotidien)) {
            // set the owning side to null (unless already changed)
            if ($suiviQuotidien->getIdUtilisateur() === $this) {
                $suiviQuotidien->setIdUtilisateur(null);
            }
        }

        return $this;
    }
}
