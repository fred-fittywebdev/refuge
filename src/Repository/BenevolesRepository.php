<?php

namespace App\Repository;

use App\Entity\Benevoles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Benevoles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Benevoles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Benevoles[]    findAll()
 * @method Benevoles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BenevolesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Benevoles::class);
    }

    // /**
    //  * @return Benevoles[] Returns an array of Benevoles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Benevoles
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
