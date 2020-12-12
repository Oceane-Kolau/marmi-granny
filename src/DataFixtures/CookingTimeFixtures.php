<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\CookingTime;

class CookingTimeFixtures extends Fixture
{
    protected const COOKINGTIME = [
        '10 minutes - 20 minutes',
        '20 minutes - 30 minutes',
        '30 minutes - 50 minutes',
        '1 heure et plus',
        'Presque la journée'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::COOKINGTIME as $key => $name) {
            $cookingTime = new CookingTime();
            $cookingTime->setName($name);
            $manager->persist($cookingTime);
            $this->addReference('cookingTime_' . $key, $cookingTime);
        }
        $manager->flush();
    }
}