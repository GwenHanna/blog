<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleDetailController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article_detail')]
    public function index($id, ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->find($id);

        return $this->render('article_detail/index.html.twig', [
            'name' => $article->getTitle(),
            'article'   => $article
        ]);
    }
}
