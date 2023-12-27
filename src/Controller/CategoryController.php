<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Program;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use PhpParser\Node\Stmt\Catch_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category', name: 'category_')]
class CategoryController extends AbstractController
{   
    #[Route('/', name: 'index')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }


    #[Route('/{name<[a-zA-Z]+$>}', name: 'show')]
    public function show(Category $category): Response
    {
        $programs = $category->getPrograms();
        //$repository = $em->getRepository(Category::class);
        //$programs = $repository->findBy(['name' => $name]);
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' => $programs

        ]);
    }
}
