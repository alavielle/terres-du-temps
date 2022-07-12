<?php

namespace App\Repository;

use App\Entity\Actu;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Actu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actu[]    findAll()
 * @method Actu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actu::class);
    }

    
    public function getSearchActu($periode = null , $key=null){

        $qb = $this->createQueryBuilder('a')
                   ->innerJoin('a.period', 'p')
                   ->orderBy('a.periode', 'DESC');

            if($periode && $periode !== '') {

                $qb->andWhere('a.periode LIKE :periode')
                   ->setParameter('periode', '%' . $periode . '%');
            }
           
            if($key && $key !== '') {
                $qb->andWhere('a.description LIKE :key')
                   ->setParameter('key', '%' . $key . '%');
            }
                  
         return $qb->getQuery()->getResult();

    }

    public function findOneByIsHomePage(): ?Actu
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.is_in_home_page = :val')
            ->setParameter('val', true)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    public function findOneById($value): ?Actu
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
