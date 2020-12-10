<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Difficulty;

class DifficultyFixtures extends Fixture
{
    protected const DIFFICULTIES = [
        'Très facile',
        'Facile',
        'Niveau moyen',
        'Difficile',
        'Ceinture noir de cuisine'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::DIFFICULTIES as $key => $name) {
            $difficulty = new Difficulty();
            $difficulty->setName($name);
            $manager->persist($difficulty);
            $this->addReference('difficulty_' . $key, $difficulty);
        }
        $manager->flush();
    }
}