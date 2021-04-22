<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Entity\Search\MovieSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * @return Query Returns an array of Movie objects
     *
     */
    public function findAllVisibleQuery(MovieSearch  $search): Query

    {
        $query = $this->findVisibleQuery();

        if ($search->getDepositary()) {
            $query = $query
                ->andWhere('m.user = :depositary' )
                ->setParameter('depositary', $search->getDepositary());
        }

        if ($search->getDirector()) {
            $query = $query
                ->andWhere('m.director= :director' )
                ->setParameter('director', $search->getDirector());
        }

        if ($search->getGenders()->count()>0)
        {
            $query = $query
                ->andWhere('m.genders = :genders')
                ->setParameter('genders', $search->getGenders());
        }
        return $query->getQuery();

    }

    /**
     * @return Movie[] Returns an array of Movie objects
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
        return $this->createQueryBuilder('m');
    }
}
