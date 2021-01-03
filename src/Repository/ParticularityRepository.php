<?php

namespace App\Repository;

use App\Entity\Particularity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Particularity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Particularity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Particularity[]    findAll()
 * @method Particularity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticularityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Particularity::class);
    }

    // /**
    //  * @return Particularity[] Returns an array of Particularity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Particularity
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
