<?php

namespace App\Controller;

use App\Entity\Season;
use App\Form\SeasonType;
use App\Repository\SeasonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    #[Route('/season', name: 'season_index')]
    public function index(SeasonRepository $seasonRepository): Response
    {
        return $this->render('season/index.html.twig', [
            'seasons' => $seasonRepository->findall()
        ]);
    }

    #[Route('/season/new', name: 'season_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SeasonType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('season/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/season/edit/{id<\d+>}', name: 'season_edit')]
    public function edit(Season $season, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SeasonType::class, $season);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('season/new.html.twig', [
            'season' => $season,
            'form' => $form
        ]);
    }

    #[Route('/season/delete/{id<\d+>}', name: 'season_edit')]
    public function delete(Season $season, EntityManagerInterface $em): Response
    {
            $em->remove($season);
            $em->flush();
            return $this->redirectToRoute('program_index');
    }
}
