<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('category')
            ->add(BooleanFilter::new('isActual'))
            ->add('difficulty')
            ->add('cost')
            ->add('particularity')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            TextEditorField::new('listIngredients'),
            TextField::new('principalIngredient'),
            TextEditorField::new('tips'),
            BooleanField::new('isActual'),
            IntegerField::new('nbPeople'),
            AssociationField::new('cookingTime', "CookingTime"),
            AssociationField::new('cost', "Cost"),
            AssociationField::new('difficulty', "Difficulty"),
            AssociationField::new('category', "Category"),
            AssociationField::new('particularity', "Particularity"),
            AssociationField::new('typeRecipe', "TypeRecipe"),
        ];
    }
    
}
