<?php

namespace App\Repository;

use App\Entity\CookingExpertise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CookingExpertise|null find($id, $lockMode = null, $lockVersion = null)
 * @method CookingExpertise|null findOneBy(array $criteria, array $orderBy = null)
 * @method CookingExpertise[]    findAll()
 * @method CookingExpertise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CookingExpertiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CookingExpertise::class);
    }

    // /**
    //  * @return CookingExpertise[] Returns an array of CookingExpertise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CookingExpertise
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
