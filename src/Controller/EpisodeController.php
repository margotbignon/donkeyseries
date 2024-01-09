<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Form\EpisodeType;
use App\Repository\EpisodeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpisodeController extends AbstractController
{
    #[Route('/episode', name: 'episode_index')]
    public function index(EpisodeRepository $episodeRepository): Response
    {
        return $this->render('episode/index.html.twig', [
            'episodes' => $episodeRepository->findAll()
        ]);
    }


    #[Route('/episode/new', name: 'episode_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EpisodeType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('episode/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/episode/edit/{id<\d+>}', name: 'episode_edit')]
    public function edit(Episode $episode, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('episode/new.html.twig', [
            'episode' => $episode,
            'form' => $form
        ]);
    }

    #[Route('/season/delete/{id<\d+>}', name: 'episode_edit')]
    public function delete(Episode $episode, EntityManagerInterface $em): Response
    {
            $em->remove($episode);
            $em->flush();
            return $this->redirectToRoute('program_index');
    }
}
