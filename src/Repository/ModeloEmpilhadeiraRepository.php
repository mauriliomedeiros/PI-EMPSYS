<?php

namespace App\Repository;

use App\Entity\ModeloEmpilhadeira;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModeloEmpilhadeira>
 *
 * @method ModeloEmpilhadeira|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeloEmpilhadeira|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeloEmpilhadeira[]    findAll()
 * @method ModeloEmpilhadeira[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeloEmpilhadeiraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeloEmpilhadeira::class);
    }

    /**
     * @param ModeloEmpilhadeira $entity
     * @param bool $flush
     */
    public function add(ModeloEmpilhadeira $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param ModeloEmpilhadeira $entity
     * @param bool $flush
     */
    public function remove(ModeloEmpilhadeira $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Empilhadeira[] Returns an array of Empilhadeira objects
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
    public function findOneBySomeField($value): ?Empilhadeira
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
