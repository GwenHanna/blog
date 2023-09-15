<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use PhpParser\Node\Expr\Empty_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleDetailController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article_detail')]
    public function index($id, ArticleRepository $articleRepository): Response
    {
        $article = $articleRepository->find($id);

        $package = new Package(new EmptyVersionStrategy());

        return $this->render('article_detail/index.html.twig', [
            'name' => $article->getTitle(),
            'article'   => $article,
            'img'      => $package->getUrl($article->getImg())
        ]);
    }
}
