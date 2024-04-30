<?php

namespace App\Repository;

use App\Entity\DependDe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DependDe>
 *
 * @method DependDe|null find($id, $lockMode = null, $lockVersion = null)
 * @method DependDe|null findOneBy(array $criteria, array $orderBy = null)
 * @method DependDe[]    findAll()
 * @method DependDe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DependDeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DependDe::class);
    }

    //    /**
    //     * @return DependDe[] Returns an array of DependDe objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('d.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?DependDe
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
