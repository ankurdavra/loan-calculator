<?php

namespace App\Repository;

use App\Entity\Tranches;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tranches|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tranches|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tranches[]    findAll()
 * @method Tranches[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranchesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tranches::class);
    }

    public function findMaxAmountByTrancheType($value): ?Tranches
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.tranche_type = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

}
