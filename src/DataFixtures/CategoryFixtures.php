<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{


    public function load(ObjectManager $manager): void
    {
        $categories = [
            'Action',
            'Aventure',
            'Animation',
            'Fantastique',
            'Horreur'
        ];
        foreach ($categories as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $this->addReference('CATEGORY_'.strtoupper($categoryName), $category);
        }

        $manager->flush();
    }
}
