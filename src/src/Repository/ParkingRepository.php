<?php

namespace App\Repository;

use App\Entity\Parking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Parking>
 */
class ParkingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parking::class);
    }

    public function getLastElements($rows = 5)
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults($rows)
            ->orderBy('p.mdate', 'DESC')
            ->getQuery()
            ->getResult();
    }

}
