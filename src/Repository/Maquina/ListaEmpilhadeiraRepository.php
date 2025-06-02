<?php

namespace App\Repository\Maquina;

use App\Entity\Maquina\ListaEmpilhadeira;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListaEmpilhadeira>
 *
 * @method ListaEmpilhadeira|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListaEmpilhadeira|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListaEmpilhadeira[]    findAll()
 * @method ListaEmpilhadeira[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListaEmpilhadeiraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListaEmpilhadeira::class);
    }

    /**
     * @param ListaEmpilhadeira $entity
     * @param bool $flush
     */
    public function add(ListaEmpilhadeira $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param ListaEmpilhadeira $entity
     * @param bool $flush
     */
    public function remove(ListaEmpilhadeira $entity, bool $flush = true): void
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
