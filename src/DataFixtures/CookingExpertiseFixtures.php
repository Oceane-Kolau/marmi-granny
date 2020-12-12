<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CookingExpertise;

class CookingExpertiseFixtures extends Fixture
{
    protected const COOKINGEXPERTISES = [
        'Débutante',
        'Catastrophique',
        'Correct',
        'Moyen',
        'Bonne',
        'Ceinture noir'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::COOKINGEXPERTISES as $key => $name) {
            $cookingExpertise = new CookingExpertise();
            $cookingExpertise->setName($name);
            $manager->persist($cookingExpertise);
            $this->addReference('cookingExpertise_' . $key, $cookingExpertise);
        }
        $manager->flush();
    }
}