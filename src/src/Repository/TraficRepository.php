<?php

namespace App\Repository;

use App\Entity\Trafic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Trafic>
 */
class TraficRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trafic::class);
    }

    public function getLastElements($rows = 5)
    {
        return $this->createQueryBuilder('t')
            ->setMaxResults($rows)
            ->orderBy('t.mdate', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
