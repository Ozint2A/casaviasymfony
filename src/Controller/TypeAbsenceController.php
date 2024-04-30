<?php

namespace App\Controller;

use App\Entity\TypeAbsence;
use App\Form\TypeAbsenceType;
use App\Repository\TypeAbsenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/type/absence')]
class TypeAbsenceController extends AbstractController
{
    #[Route('/', name: 'app_type_absence_index', methods: ['GET'])]
    public function index(TypeAbsenceRepository $typeAbsenceRepository): Response
    {
        return $this->render('type_absence/index.html.twig', [
            'type_absences' => $typeAbsenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_absence_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeAbsence = new TypeAbsence();
        $form = $this->createForm(TypeAbsenceType::class, $typeAbsence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeAbsence);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_absence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_absence/new.html.twig', [
            'type_absence' => $typeAbsence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_absence_show', methods: ['GET'])]
    public function show(TypeAbsence $typeAbsence): Response
    {
        return $this->render('type_absence/show.html.twig', [
            'type_absence' => $typeAbsence,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_absence_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeAbsence $typeAbsence, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeAbsenceType::class, $typeAbsence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_absence_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_absence/edit.html.twig', [
            'type_absence' => $typeAbsence,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_absence_delete', methods: ['POST'])]
    public function delete(Request $request, TypeAbsence $typeAbsence, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeAbsence->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($typeAbsence);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_absence_index', [], Response::HTTP_SEE_OTHER);
    }
}
