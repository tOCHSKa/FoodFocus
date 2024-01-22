<?php

// src/Controller/DashboardController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use App\Repository\ProductService;
use Symfony\Component\HttpFoundation\JsonResponse;

class DashboardController extends AbstractController
{

    public function __construct(private ProductService $productService) {
        $this->productService = $productService;
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Request $request): Response {
        $form = $this->createFormBuilder(null)
            ->add('searchTerm', SearchType::class, [
                'label' => false,
                'attr' => ['class' => 'auto-type', 'id' => 'search', 'placeholder' => 'Search...']
            ])
            ->getForm();

        $form->handleRequest($request);
        $products = [];


        if ($form->isSubmitted() && $form->isValid()) {
            $searchTerm = $form->getData()['searchTerm'] ?? '';
            $products = $this->productService->fetchFromExternalAPI($searchTerm);
        }

        return $this->render('dashboard/dashboard.html.twig', [
            'search_form' => $form->createView(),
            'products' => $products ?? []
        ]);
    }

    #[Route('/ajax-search', name: 'ajax_search', methods: ['POST'])]
    public function ajaxSearch(Request $request): JsonResponse {
        if ($request->isXmlHttpRequest() || $request->query->get('showJson') == 1) {
            $jsonData = json_decode($request->getContent(), true);
            $searchTerm = $jsonData['searchTerm'] ?? '';
    
            // Votre logique pour interroger l'API externe
            $products = $this->productService->fetchFromExternalAPI($searchTerm);
    
            return $this->json(['products' => $products]);
        }
    
        throw $this->createNotFoundException('Cette route ne peut être accédée que via AJAX');
    }
}
