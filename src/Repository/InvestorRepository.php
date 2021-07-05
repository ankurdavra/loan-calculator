<?php

namespace App\Repository;

use App\Entity\Investor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Investor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Investor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Investor[]    findAll()
 * @method Investor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Investor::class);
    }

    public function findInvestorByDate($start_date, $end_date)
    {
        $tranche = $this->createQueryBuilder('i')
            ->andWhere('i.loan_start_date >= :sdate')
            ->andWhere('i.loan_start_date <= :edate')
            ->setParameter('sdate', $start_date)
            ->setParameter('edate', $end_date)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

        return $tranche;

    }


    /*
    public function findOneBySomeField($value): ?Investor
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
