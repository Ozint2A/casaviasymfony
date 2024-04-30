<?php

namespace App\Repository;

use App\Entity\ModelSemaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModelSemaine>
 *
 * @method ModelSemaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelSemaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelSemaine[]    findAll()
 * @method ModelSemaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelSemaineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelSemaine::class);
    }

    //    /**
    //     * @return ModelSemaine[] Returns an array of ModelSemaine objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ModelSemaine
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
