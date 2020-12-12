<?php

namespace App\Controller\Admin;

use App\Entity\TypeRecipe;
use App\Entity\Category;
use App\Entity\CookingTime;
use App\Entity\Cost;
use App\Entity\Difficulty;
use App\Entity\Particularity;
use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/admin", name="admin")
* @IsGranted("ROLE_ADMIN")
*/

class DashboardController extends AbstractDashboardController
{
    /**
    * @Route(name="admin")
    */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Marmi Granny');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Recipe', 'fas fa-list', Recipe::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('CookingTime', 'fas fa-list', CookingTime::class);
        yield MenuItem::linkToCrud('Cost', 'fas fa-list', Cost::class);
        yield MenuItem::linkToCrud('Difficulty', 'fas fa-list', Difficulty::class);
        yield MenuItem::linkToCrud('Particularity', 'fas fa-list', Particularity::class);
        yield MenuItem::linkToCrud('TypeRecipe', 'fas fa-list', TypeRecipe::class);
    }
}
