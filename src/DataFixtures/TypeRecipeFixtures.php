<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\TypeRecipe;

class TypeRecipeFixtures extends Fixture
{
    protected const TYPERECIPE = [
        'Entrée',
        'Plat principale',
        'Dessert',
        'Apéritif',
        'Boisson',
        'Petit-déjeuner',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::TYPERECIPE as $key => $type) {
            $typeRecipe = new TypeRecipe();
            $typeRecipe->setType($type);
            $manager->persist($typeRecipe);
            $this->addReference('typeRecipe_' . $key, $typeRecipe);
        }
        $manager->flush();
    }
}