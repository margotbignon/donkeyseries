<?php
// src/Controller/ProgramController.php
namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Repository\ProgramRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;

#[Route('/program', name: 'program_')]
Class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    #[Route('/{id<\d+>}', methods:["GET"], name: 'show')]
    public function show(Program $program): Response
    {

        return $this->render('program/show.html.twig', [
            'program' => $program,
            'seasons' => $program->getSeasons(),
        ]);
    }

    #[Route('/{idProgram<\d+>}/seasons/{idSeason<\d+>}', name: 'season_show')]
    public function showSeason(#[MapEntity(id: 'idProgram')] Program $program, #[MapEntity(id : 'idSeason')] Season $season): Response
    {
        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);
    }

    #[Route('/{idProgram<\d+>}/seasons/{idSeason<\d+>}/episode/{idEpisode<\d+>}', name: 'episode_show')]
    public function showEpisode(#[MapEntity(id: 'idProgram')] Program $program, #[MapEntity(id : 'idSeason')] Season $season, #[MapEntity(id : 'idEpisode')] Episode $episode): Response
    {
        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode
        ]);
    }

    /*#[Route('/{idProgram<\d+>}/seasons/{idSeason<\d+>}', methods:["GET"], name: 'season_show')]
    public function showSeason(int $idProgram, int $idSeason, EntityManagerInterface $em): Response
    {

        $program = $em->getRepository(Program::class)
        ->findOneBy(['id' => $idProgram]);


        $season = $em->getRepository(Season::class)
        ->findOneBy(['id' => $idSeason]);

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);
    }*/
}