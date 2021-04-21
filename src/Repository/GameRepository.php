<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\Search\GameSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    /**
     * @return Query Returns an array of Game objects
     *
     */
    public function findAllVisibleQuery(GameSearch  $search): Query

    {
        $query = $this->findVisibleQuery();

        if ($search->getDepositary()) {
            $query = $query
                ->andWhere('g.user = :depositary' )
                ->setParameter('depositary', $search->getDepositary());
        }

        if ($search->getTitle()) {
            $query = $query
                ->andWhere('g.title= :title' )
                ->setParameter('artist', $search->getTitle());
        }
        return $query->getQuery();

    }

    /**
     * @return Game[] Returns an array of Game objects
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
        return $this->createQueryBuilder('g');
    }
}
