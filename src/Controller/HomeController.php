<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ArticleRepository $articleRepository,
        CategoryRepository $category
    ): Response {
        $linkCategory = $category->findAll();
        return $this->render('home/index.html.twig', [
            'name' => 'Home',
            'linksCategory'  => $linkCategory
        ]);
    }
}
