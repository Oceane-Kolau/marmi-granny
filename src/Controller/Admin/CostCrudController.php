<?php

namespace App\Controller\Admin;

use App\Entity\Cost;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cost::class;
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
