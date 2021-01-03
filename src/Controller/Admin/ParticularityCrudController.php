<?php

namespace App\Controller\Admin;

use App\Entity\Particularity;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParticularityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Particularity::class;
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
