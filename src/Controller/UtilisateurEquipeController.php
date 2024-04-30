<?php

namespace App\Controller;

use App\Entity\UtilisateurEquipe;
use App\Form\UtilisateurEquipeModelType;
use App\Form\UtilisateurEquipeType;
use App\Repository\UtilisateurEquipeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/utilisateurequipe')]
class UtilisateurEquipeController extends AbstractController
{
    #[Route('/', name: 'app_utilisateur_equipe_index', methods: ['GET'])]
    public function index(UtilisateurEquipeRepository $utilisateurEquipeRepository): Response
    {
        return $this->render('utilisateur_equipe/index.html.twig', [
            'utilisateur_equipes' => $utilisateurEquipeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_utilisateur_equipe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilisateurEquipe = new UtilisateurEquipe();
        $form = $this->createForm(UtilisateurEquipeType::class, $utilisateurEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($utilisateurEquipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur_equipe/new.html.twig', [
            'utilisateur_equipe' => $utilisateurEquipe,
            'form' => $form,
        ]);
    }
    #[Route('/modelnew', name: 'app_utilisateur_equipe_model_new', methods: ['GET', 'POST'])]
    public function modelnew(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilisateurEquipe = new UtilisateurEquipe();
        $form = $this->createForm(UtilisateurEquipeModelType::class, $utilisateurEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($utilisateurEquipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur_equipe/new.html.twig', [
            'utilisateur_equipe' => $utilisateurEquipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_equipe_show', methods: ['GET'])]
    public function show(UtilisateurEquipe $utilisateurEquipe): Response
    {
        return $this->render('utilisateur_equipe/show.html.twig', [
            'utilisateur_equipe' => $utilisateurEquipe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateur_equipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, UtilisateurEquipe $utilisateurEquipe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtilisateurEquipeType::class, $utilisateurEquipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur_equipe/edit.html.twig', [
            'utilisateur_equipe' => $utilisateurEquipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_equipe_delete', methods: ['POST'])]
    public function delete(Request $request, UtilisateurEquipe $utilisateurEquipe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateurEquipe->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($utilisateurEquipe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_utilisateur_equipe_index', [], Response::HTTP_SEE_OTHER);
    }
}
