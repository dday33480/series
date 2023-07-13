<?php

namespace App\Repository;

use App\Entity\Series;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Series>
 *
 * @method Series|null find($id, $lockMode = null, $lockVersion = null)
 * @method Series|null findOneBy(array $criteria, array $orderBy = null)
 * @method Series[]    findAll()
 * @method Series[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Series::class);
    }

    public function add(Series $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Series $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBestSeries() 
    {
        /*
        //DQL example
        $entityManager = $this->getEntityManager();
        $dql = "
            SELECT s FROM App\Entity\Series s
            WHERE s.popularity > 90
            AND s.vote > 7
            ORDER BY s.popularity DESC    
        ";
        $query = $entityManager->createQuery($dql);
        $query->setMaxResults(10);
        $results = $query->getResult();
        */

        //QueryBuilder example
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder->andWhere('s.popularity > 90');
        $queryBuilder->andWhere('s.vote > 7');
        $queryBuilder->addOrderBy('s.popularity', 'DESC');
        $query = $queryBuilder->getQuery();

        $query->setMaxResults(10);
        $results = $query->getResult();
        return $results;
    }

}
