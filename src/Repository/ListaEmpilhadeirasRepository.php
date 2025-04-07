<?php

namespace App\Repository;

use App\Entity\ListaEmpilhadeiras;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListaEmpilhadeiras>
 *
 * @method ListaEmpilhadeiras|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListaEmpilhadeiras|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListaEmpilhadeiras[]    findAll()
 * @method ListaEmpilhadeiras[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListaEmpilhadeirasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListaEmpilhadeiras::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ListaEmpilhadeiras $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ListaEmpilhadeiras $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ListaEmpilhadeiras[] Returns an array of ListaEmpilhadeiras objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListaEmpilhadeiras
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
