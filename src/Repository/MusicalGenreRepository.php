<?php

namespace App\Repository;

use App\Entity\MusicalGenre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusicalGenre>
 *
 * @method MusicalGenre|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusicalGenre|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusicalGenre[]    findAll()
 * @method MusicalGenre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusicalGenreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusicalGenre::class);
    }

//    /**
//     * @return MusicalGenre[] Returns an array of MusicalGenre objects
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

//    public function findOneBySomeField($value): ?MusicalGenre
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
