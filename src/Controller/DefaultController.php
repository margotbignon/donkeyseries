<?php

namespace App\Controller;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(SeasonRepository $seasonRepository): Response
    {
        $lastPrograms = $seasonRepository->getLastSeasons();

        return $this->render('default/index.html.twig', [
            'lastPrograms' => $lastPrograms,
        ]);
    }
}
