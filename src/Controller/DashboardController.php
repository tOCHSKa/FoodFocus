<?php

namespace App\Controller;

use GuzzleHttp\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest; // Renommez la classe pour éviter les conflits
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig');
    }
    #[Route('/dashboard/request', name: 'app_dashboard.request')]
    public function RequestGET(SymfonyRequest $request): JsonResponse
    {
        // Obtenez les données JSON de la requête
        $jsonData = json_decode($request->getContent(), true);
        // Vérifiez si la clé 'search_terms' existe dans les données JSON
        if (isset($jsonData['search_terms'])) {
            // Utilisez la valeur de la clé 'search_terms' dans $postData
            $queryParameters = [
                'search_terms' => $jsonData['search_terms'],
                'page_size' => 10,
                'json' => true,
            ];
        } else {
            // Gérez le cas où 'search_terms' n'est pas présent dans les données JSON
            return $this->json(['error' => 'search_terms not provided in JSON data'], 400);
        }

        // Construction de l'URL complet avec http_build_query
        $baseUri = 'https://world.openfoodfacts.org/cgi/search.pl';
        $fullUrl = $baseUri . '?' . http_build_query($queryParameters);

        // Configuration du client Guzzle
        $client = new Client([
            'base_uri' => $fullUrl,
            'timeout'  => 10.0,
        ]);
        // https://world.openfoodfacts.org/cgi/search.pl?search_terms=${encodeURIComponent(searchTerm)}&page_size=4&json=1
        // https://world.openfoodfacts.org/cgi/search.pl?search_terms=chocolate&page_size=10&json=true


        // Envoi de la requête GET avec les paramètres dans l'URL
        try {
            $response = $client->request('GET', 'search.pl', [
                'query' => $queryParameters,
            ]);

            // Traitement de la réponse
            $data = json_decode($response->getBody(), true);

            return $this->json($data);
        } catch (\Exception $e) {
            // Gestion des erreurs
            return $this->json(['error' => $e->getMessage()], 500);
        }
    }
}
