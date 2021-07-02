<?php

namespace App\Repository;

use App\Entity\Especes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Especes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Especes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Especes[]    findAll()
 * @method Especes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspecesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Especes::class);
    }

    // /**
    //  * @return Especes[] Returns an array of Especes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Especes
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
