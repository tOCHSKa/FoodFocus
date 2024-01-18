<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig');
    }

    #[Route('/homepage/login', name: 'app_homepage.sub')]
    public function subscribe(ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();
        $personne = new Personne();
        // $personne est l'image de notre formulaire 
        $form = $this->createForm(PersonneType::class, $personne);

        return $this->render('homepage/form.html.twig', [
        'form' => $form->createView()
    ]);
    }
}
