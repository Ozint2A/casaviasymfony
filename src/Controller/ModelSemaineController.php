<?php

namespace App\Controller;

use App\Entity\ModelSemaine;
use App\Form\ModelSemaineType;
use App\Repository\ModelSemaineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/model/semaine')]
class ModelSemaineController extends AbstractController
{
    #[Route('/', name: 'app_model_semaine_index', methods: ['GET'])]
    public function index(ModelSemaineRepository $modelSemaineRepository): Response
    {
        return $this->render('model_semaine/index.html.twig', [
            'model_semaines' => $modelSemaineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_model_semaine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $modelSemaine = new ModelSemaine();
        $form = $this->createForm(ModelSemaineType::class, $modelSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($modelSemaine);
            $entityManager->flush();

            return $this->redirectToRoute('app_model_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('model_semaine/new.html.twig', [
            'model_semaine' => $modelSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_model_semaine_show', methods: ['GET'])]
    public function show(ModelSemaine $modelSemaine): Response
    {
        return $this->render('model_semaine/show.html.twig', [
            'model_semaine' => $modelSemaine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_model_semaine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ModelSemaine $modelSemaine, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ModelSemaineType::class, $modelSemaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_model_semaine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('model_semaine/edit.html.twig', [
            'model_semaine' => $modelSemaine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_model_semaine_delete', methods: ['POST'])]
    public function delete(Request $request, ModelSemaine $modelSemaine, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$modelSemaine->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($modelSemaine);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_model_semaine_index', [], Response::HTTP_SEE_OTHER);
    }
}
