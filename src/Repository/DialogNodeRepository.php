<?php

namespace App\Repository;

use App\Entity\DialogNode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DialogNode|null find($id, $lockMode = null, $lockVersion = null)
 * @method DialogNode|null findOneBy(array $criteria, array $orderBy = null)
 * @method DialogNode[]    findAll()
 * @method DialogNode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DialogNodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DialogNode::class);
    }

    // /**
    //  * @return DialogNode[] Returns an array of DialogNode objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DialogNode
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
