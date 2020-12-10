<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Particularity;

class ParticularityFixtures extends Fixture
{
    protected const PARTICULARITIES = [
        'Entrée',
        'Plat principale',
        'Dessert',
        'Apéritif',
        'Boisson',
        'Petit-déjeuner',
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::PARTICULARITIES as $key => $type) {
            $particularity = new Particularity();
            $particularity->setType($type);
            $manager->persist($particularity);
            $this->addReference('particularity_' . $key, $particularity);
        }
        $manager->flush();
    }
}