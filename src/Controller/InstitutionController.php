<?php

namespace App\Controller;

use App\Entity\Institution;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstitutionController extends AbstractController
{
    #[Route('/institutions', name: 'institution_list')]
    public function index(): Response
    {
        $jsonFile = __DIR__ . '/../../data/institutions.json';
        $institutions = json_decode(file_get_contents($jsonFile), true) ?? [];

        return $this->render('institution/index.html.twig', [
            'institutions' => $institutions,
        ]);
    }

    #[Route('/institution/create', name: 'institution_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response
    {
        $jsonFile = __DIR__ . '/../../data/institutions.json';
        $institutions = json_decode(file_get_contents($jsonFile), true) ?? [];

        if ($request->isMethod('POST')) {
            $newInstitution = [
                'id' => count($institutions) + 1,
                'name' => $request->request->get('name'),
                'address' => $request->request->get('address'),
                'manager' => $request->request->get('manager'),
            ];
            $institutions[] = $newInstitution;
            file_put_contents($jsonFile, json_encode($institutions, JSON_PRETTY_PRINT));

            return $this->redirectToRoute('institution_list');
        }

        return $this->render('institution/create.html.twig');
    }
}
