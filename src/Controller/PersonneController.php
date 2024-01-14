<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin')]

class PersonneController extends AbstractController
{
    #[Route('/', name: 'dashboard.list')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->findAll();
        return $this->render('dashboard/users.html.twig',  ['personnes' => $personnes]);
    }

    #[Route('/{id<\d+>}', name: 'dashboard.detail')]
    public function detail(ManagerRegistry $doctrine, $id): Response
    {
        $repository = $doctrine->getRepository(Personne::class);
        $personne = $repository->find($id);
        if (!$personne) {
            $this->addFlash(type: 'error', message: "La personne d'id $id n'existe pas");
            return $this->redirectToRoute(route: 'dashboard.list');
        }
        return $this->render('dashboard/detail.html.twig',  ['personne' => $personne]);
    }
}
