<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Faker;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 3; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail('user' . $i . '@user.com');
            $user->setPassword($this->encoder->encodePassword($user, 'password'));
            $user->setRoles(['ROLE_USER']);
            $user->setCookingExpertise($this->getReference('cookingExpertise_' . rand(0, 5)));
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
        }
        for ($i = 3; $i < 6; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setEmail('user' . $i . '@admin.com');
            $user->setPassword($this->encoder->encodePassword($user, 'password'));
            $user->setRoles(['ROLE_ADMIN']);
            $user->setCookingExpertise($this->getReference('cookingExpertise_' . rand(0, 5)));
            $manager->persist($user);
            $this->addReference('user_' . $i, $user);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [CookingExpertiseFixtures::class];
    }
}
