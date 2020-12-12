<?php

namespace App\Controller\Admin;

use App\Entity\TypeRecipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeRecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeRecipe::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
