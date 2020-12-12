<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Cost;

class CostFixtures extends Fixture
{
    protected const COSTS = [
        'Bon marché',
        'Coût moyen',
        'Assez cher',
        'Jour de fête',
        'Spécial étudiant'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::COSTS as $key => $name) {
            $cost = new Cost();
            $cost->setName($name);
            $manager->persist($cost);
            $this->addReference('cost_' . $key, $cost);
        }
        $manager->flush();
    }
}