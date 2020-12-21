<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Recipe;
use Faker;
class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    

    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 30; $i++) {
            $recipe = new Recipe();
            $recipe->setTitle($faker->words(4, true));
            $recipe->setDescription($faker->paragraph());
            $recipe->setListIngredients($faker->words(7, true));
            $recipe->setPrincipalIngredient($faker->words(2, true));
            $recipe->setNbPeople(rand(1, 15));
            $recipe->setTips($faker->paragraph());
            $recipe->setIsActual($faker->boolean());
            $recipe->setCookingTime($this->getReference('cookingTime_' . rand(0, 4)));
            $recipe->setDifficulty($this->getReference('difficulty_' . rand(0, 4)));
            $recipe->setCost($this->getReference('cost_' . rand(0, 4)));
            $recipe->setTypeRecipe($this->getReference('typeRecipe_' . rand(0, 5)));
            $manager->persist($recipe);
            $this->addReference('recipe_' . $i, $recipe);

            $manager->flush();
        }
    }   
    
    public function getDependencies()
    {
        return array (
            TypeRecipeFixtures::class,
            CookingTimeFixtures::class,
            CategoryFixtures::class,
            CostFixtures::class,
            ParticularityFixtures::class,
            DifficultyFixtures::class
        );
    }
}
