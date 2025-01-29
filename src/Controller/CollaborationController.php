<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CollaborationController extends AbstractController
{
    private string $dataFilePath = '../data/collaborations.json';

    #[Route('/collaboration', name: 'collaboration_list')]
    public function index(): Response
    {
        // Charger les collaborations depuis le fichier JSON
        if (file_exists($this->dataFilePath)) {
            $collaborations = json_decode(file_get_contents($this->dataFilePath), true);
        } else {
            $collaborations = [];
        }

        return $this->render('collaboration/index.html.twig', [
            'collaborations' => $collaborations,
        ]);
    }

    #[Route('/collaboration/create', name: 'collaboration_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Charger les données existantes
            $collaborations = file_exists($this->dataFilePath) 
                ? json_decode(file_get_contents($this->dataFilePath), true) 
                : [];

            // Ajouter une nouvelle collaboration
            $newCollaboration = [
                'id' => count($collaborations) + 1,
                'title' => $request->request->get('title'),
                'description' => $request->request->get('description'),
            ];
            $collaborations[] = $newCollaboration;

            // Sauvegarder dans le fichier JSON
            file_put_contents($this->dataFilePath, json_encode($collaborations, JSON_PRETTY_PRINT));

            return $this->redirectToRoute('collaboration_list');
        }

        return $this->render('collaboration/create.html.twig');
    }
}
