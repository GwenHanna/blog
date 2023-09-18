<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'app_category')]
    public function index(
        ArticleRepository $articleRepository,
        CategoryRepository $category,
        $id
    ): Response {

        $articles = $articleRepository->findByCategories($id);
        $package = new Package(new EmptyVersionStrategy());
        foreach ($articles as $value) {
            $img = $value->setImg($package->getUrl($value->getImg()));
        }
        return $this->render('category/index.html.twig', [
            'name' => 'Category',
            'articles'  => $articles,
            'img'   => $img->getImg()
        ]);
    }
}
