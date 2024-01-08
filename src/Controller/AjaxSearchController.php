<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxSearchController extends AbstractController
{
    #[Route('/ajax-search', name: 'app_ajax_search')]
    public function index(): Response
    {
        return $this->render('ajax_search/index.html.twig', [
            'controller_name' => 'AjaxSearchController',
        ]);
    }
}
