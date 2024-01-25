<?php

namespace App\Repository;

use App\Entity\SuiviQuotidien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SuiviQuotidien>
 *
 * @method SuiviQuotidien|null find($id, $lockMode = null, $lockVersion = null)
 * @method SuiviQuotidien|null findOneBy(array $criteria, array $orderBy = null)
 * @method SuiviQuotidien[]    findAll()
 * @method SuiviQuotidien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuiviQuotidienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SuiviQuotidien::class);
    }

//    /**
//     * @return SuiviQuotidien[] Returns an array of SuiviQuotidien objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SuiviQuotidien
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
