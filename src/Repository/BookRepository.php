<?php

namespace App\Repository;

use App\Entity\Book;
use App\Entity\Search\BookSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Query Returns an array of Book objects
     *
     */
    public function findAllVisibleQuery(BookSearch  $search): Query

    {
       $query = $this->findVisibleQuery();

       if ($search->getDepositary()) {
           $query = $query
               ->andWhere('b.user = :depositary' )
               ->setParameter('depositary', $search->getDepositary());
       }

        if ($search->getAuthor()) {
            $query = $query
                ->andWhere('b.author = :author' )
                ->setParameter('author', $search->getAuthor());
        }

        if ($search->getGenders()->count()>0)
        {
                $query = $query
                    ->andWhere('b.genders = :genders')
                    ->setParameter('genders', $search->getGenders());
        }
            return $query->getQuery();

    }

    /**
     * @return Book[] Returns an array of Book objects
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
        return $this->createQueryBuilder('b');
    }
}