<?php

namespace App\Repository;

use App\Entity\Disc;
use App\Entity\Search\DiscSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disc[]    findAll()
 * @method Disc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiscRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disc::class);
    }

    /**
     * @return Query Returns an array of Disc objects
     *
     */
    public function findAllVisibleQuery(DiscSearch  $search): Query

    {
        $query = $this->findVisibleQuery();

        if ($search->getDepositary()) {
            $query = $query
                ->andWhere('d.user = :depositary' )
                ->setParameter('depositary', $search->getDepositary());
        }

        if ($search->getArtist()) {
            $query = $query
                ->andWhere('d.artist= :artist' )
                ->setParameter('artist', $search->getArtist());
        }
        return $query->getQuery();

    }

    /**
     * @return Disc[] Returns an array of Disc objects
     *
     */
    public function findLatest(): array

    {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    private function findVisibleQuery(): \Doctrine\ORM\QueryBuilder
    {
        return $this->createQueryBuilder('d');
    }
}
