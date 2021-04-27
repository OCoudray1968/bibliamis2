<?php

namespace App\Repository;

use App\Entity\Loanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Loanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loanning[]    findAll()
 * @method Loanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LoanningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loanning::class);
    }

    // /**
    //  * @return Loanning[] Returns an array of Loanning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Loanning
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
