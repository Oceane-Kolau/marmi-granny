<?php

namespace App\Repository;

use App\Entity\TypeRecipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeRecipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRecipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRecipe[]    findAll()
 * @method TypeRecipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRecipe::class);
    }

    // /**
    //  * @return TypeRecipe[] Returns an array of TypeRecipe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeRecipe
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
