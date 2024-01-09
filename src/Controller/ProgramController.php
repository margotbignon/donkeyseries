<?php
// src/Controller/ProgramController.php
namespace App\Controller;


use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Form\ProgramType;
use App\Repository\ProgramRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\Request;

#[Route('/program', name: 'program_')]
Class ProgramController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $programs = $paginator->paginate(
            $programRepository->createQueryBuilder('p'), 
            $request->query->getInt('page', 1), 
            4 
        );

        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ProgramType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('program/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/edit/{id<\d+>}', name: 'edit')]
    public function edit(Program $program, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ProgramType::class, $program);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirectToRoute('program_index');
        }

        return $this->render('program/edit.html.twig', [
            'program' => $program,
            'form' => $form
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

    #[Route('/{id<\d+>}/delete', name: 'delete')]
    public function delete(Program $program, EntityManagerInterface $em): Response
    {
        $em->remove($program);
        $em->flush();

        return $this->redirectToRoute('program_index');
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