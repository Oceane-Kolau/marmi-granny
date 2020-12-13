<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\CookingTimeRepository;
use App\Repository\CostRepository;
use App\Repository\DifficultyRepository;
use App\Repository\ParticularityRepository;
use App\Repository\RecipeRepository;
use App\Repository\TypeRecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/", name="home")
*/
class HomeController extends AbstractController
{
    /**
    * @Route("/", name="home")
    */
    public function index(RecipeRepository $recipeRepository,
    CategoryRepository $categoryRepository,
    CookingTimeRepository $cookingTimeRepository,
    CostRepository $costRepository,
    DifficultyRepository $difficultyRepository,
    ParticularityRepository $particularityRepository,
    TypeRecipeRepository $typeRecipeRepository): Response
    {
        return $this->render('home/index.html.twig', [ 
            'recipes' => $recipeRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
            'cookingTimes' => $cookingTimeRepository->findAll(),
            'costs' => $costRepository->findAll(),
            'difficulties' => $difficultyRepository->findAll(),
            'particularities' => $particularityRepository->findAll(),
            'typeRecipes' => $typeRecipeRepository->findAll()
        ]);
    }
}
