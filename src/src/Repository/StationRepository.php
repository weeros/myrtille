<?php

namespace App\Repository;

use App\Entity\Station;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Station>
 */
class StationRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Station::class);
  }

    public function getLastElements($rows = 5)
    {
        return $this->createQueryBuilder('s')
            ->setMaxResults($rows)
            ->orderBy('s.mdate', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
