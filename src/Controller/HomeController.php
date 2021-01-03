<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\CategoryRepository;
use App\Repository\CookingTimeRepository;
use App\Repository\CostRepository;
use App\Repository\DifficultyRepository;
use App\Repository\ParticularityRepository;
use App\Repository\RecipeRepository;
use App\Repository\TypeRecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
* @Route("/", name="accueil_")
*/
class HomeController extends AbstractController
{
    /**
    * @Route("/", name="accueil_")
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

    /**
    * @Route("recettes", name="recettes")
    */
    public function allRecipes(RecipeRepository $recipeRepository, Request $request)
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $recipes = $recipeRepository->findSearch($data);
        return $this->render('home/all-recipes.html.twig', [
            'recipes' => $recipes,
            'form' => $form->createView()
        ]);
    }
}
