<?php

namespace App\Repository;

use App\Entity\Recipe;
use App\Data\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    /**
     * Récupère les produits en lien avec une recherche
     * @return Recipe[]
     */
    public function findSearch(SearchData $search): Array
    {
        $query = $this
            ->createQueryBuilder('recipe')
            ->join('recipe.typeRecipe', 'typeRecipe')
            ->leftJoin('recipe.particularity', 'particularity')
            ->leftJoin('recipe.cost', 'cost')
            ->leftJoin('recipe.difficulty', 'difficulty');

        if (!empty($search->typeRecipe)) {
            $query = $query
                ->andWhere('typeRecipe.id IN (:typeRecipe)')
                ->setParameter('typeRecipe', $search->typeRecipe);
        }

        if (!empty($search->particularity)) {
            $query = $query
                ->andWhere('particularity.id IN (:particularity)')
                ->setParameter('particularity', $search->particularity);
        }

        if (!empty($search->cost)) {
            $query = $query
                ->andWhere('cost.id IN (:cost)')
                ->setParameter('cost', $search->cost);
        }

        if (!empty($search->difficulty)) {
            $query = $query
                ->andWhere('difficulty.id IN (:difficulty)')
                ->setParameter('difficulty', $search->difficulty);
        }

        if (!empty($search->q)) {
            $query = $query
                ->andWhere('recipe.title LIKE :q 
                OR recipe.description LIKE :q 
                OR recipe.listIngredients LIKE :q
                OR recipe.principalIngredient LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }
    
        return $query->getQuery()->getResult();
    }

    // /**
    //  * @return Recipe[] Returns an array of Recipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recipe
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
