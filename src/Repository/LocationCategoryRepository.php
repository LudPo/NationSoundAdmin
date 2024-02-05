<?php

namespace App\Repository;

use App\Entity\LocationCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LocationCategory>
 *
 * @method LocationCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocationCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocationCategory[]    findAll()
 * @method LocationCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocationCategory::class);
    }

//    /**
//     * @return LocationCategory[] Returns an array of LocationCategory objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LocationCategory
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
