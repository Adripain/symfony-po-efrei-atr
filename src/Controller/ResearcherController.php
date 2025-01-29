<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResearcherController extends AbstractController
{
    private string $dataFile = __DIR__ . '/../../data/researchers.json';

    #[Route('/researchers', name: 'researcher_list')]
    public function index(): Response
    {
        $researchers = $this->getResearchersFromJson();

        return $this->render('researcher/index.html.twig', [
            'researchers' => $researchers,
        ]);
    }

    #[Route('/researcher/create', name: 'researcher_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $newResearcher = [
                'id' => uniqid(),
                'name' => $request->request->get('name'),
                'specialty' => $request->request->get('specialty'),
                'email' => $request->request->get('email'),
            ];

            $researchers = $this->getResearchersFromJson();
            $researchers[] = $newResearcher;
            $this->saveResearchersToJson($researchers);

            return $this->redirectToRoute('researcher_list');
        }

        return $this->render('researcher/create.html.twig');
    }

    #[Route('/researcher/{id}', name: 'researcher_detail')]
    public function detail(string $id): Response
    {
        $researchers = $this->getResearchersFromJson();
        $researcher = array_filter($researchers, fn($r) => $r['id'] === $id);

        if (!$researcher) {
            throw $this->createNotFoundException('Researcher not found');
        }

        return $this->render('researcher/detail.html.twig', [
            'researcher' => array_values($researcher)[0],
        ]);
    }

    #[Route('/researcher/{id}/edit', name: 'researcher_edit', methods: ['GET', 'POST'])]
    public function edit(string $id, Request $request): Response
    {
        $researchers = $this->getResearchersFromJson();
        $key = array_search($id, array_column($researchers, 'id'));

        if ($key === false) {
            throw $this->createNotFoundException('Researcher not found');
        }

        if ($request->isMethod('POST')) {
            $researchers[$key]['name'] = $request->request->get('name');
            $researchers[$key]['specialty'] = $request->request->get('specialty');
            $researchers[$key]['email'] = $request->request->get('email');

            $this->saveResearchersToJson($researchers);

            return $this->redirectToRoute('researcher_list');
        }

        return $this->render('researcher/edit.html.twig', [
            'researcher' => $researchers[$key],
        ]);
    }

    private function getResearchersFromJson(): array
    {
        if (!file_exists($this->dataFile)) {
            return [];
        }

        $jsonData = file_get_contents($this->dataFile);
        return json_decode($jsonData, true) ?? [];
    }

    private function saveResearchersToJson(array $researchers): void
    {
        file_put_contents($this->dataFile, json_encode($researchers, JSON_PRETTY_PRINT));
    }
}
