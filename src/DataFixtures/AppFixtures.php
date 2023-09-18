<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $product = new Product();
        // $manager->persist($product);
        $fake = Factory::create('fr_FR');
        $categories = [];

        for ($i = 0; $i < 15; $i++) {
            $category = new Category();
            $category->setName($fake->word());
            $categories[] = $category;
            $manager->persist($category);
        }


        for ($i = 0; $i < 150; $i++) {

            $article = new Article();
            $article
                ->setTitle($fake->realTextBetween(40))
                ->setContent($fake->realText(1000))
                ->setDateCreated(new DateTime())
                ->setVisible($fake->boolean(5))
                ->setDescription($fake->realText(500))
                ->setImg($fake->imageUrl())
                ->setCategory($fake->randomElement($categories));

            $manager->persist($article);
        }

        $manager->flush();
    }
}
