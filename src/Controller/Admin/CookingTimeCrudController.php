<?php

namespace App\Controller\Admin;

use App\Entity\CookingTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CookingTimeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CookingTime::class;
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
