<?php

namespace App\Service;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\Utilisateur;

class UtilisateurService
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function setUtilisateurPassword(Utilisateur $utilisateur, string $plainPassword)
    {
        $hashedPassword = $this->passwordHasher->hashPassword($utilisateur, $plainPassword);
        $utilisateur->setPassword($hashedPassword);
    }
}
