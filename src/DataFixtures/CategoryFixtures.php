<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    protected const CATEGORIES = [
        'Fruits de mer',
        'Poissons',
        'Viande',
        'Confiture',
        'Feuilleté',
        'Sauce',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $this->addReference('category_' . $key, $category);
        }
        $manager->flush();
    }
}