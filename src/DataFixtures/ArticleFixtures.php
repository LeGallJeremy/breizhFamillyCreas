<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i < 10; $i++) { 
            $article = new Article();
            $article->setTitle("Titre de l'article $i")
                    ->setContent("Designation de l'article $i")
                    ->setImage("http://placehold.it/150x150")
                    ->setCustomizable("personnalisation $i")
                    ->setQuantity(rand(10,50));
                $manager->persist($article);
        }
        $manager->flush();
    }
}
