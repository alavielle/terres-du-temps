<?php

namespace App\Repository;

use App\Entity\Agenda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Agenda|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agenda|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agenda[]    findAll()
 * @method Agenda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgendaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agenda::class);
    }

    public function findOneByIsHomePage(): ?Agenda
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.is_in_home_page = :val')
            ->setParameter('val', true)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function getSearchAgenda($periode = null , $key=null, $localisation=null, $date=null){

        $qb = $this->createQueryBuilder('c')
                   ->orderBy('c.periode', 'DESC');

            if($periode && $periode !== '') {

                $qb->andWhere('c.periode LIKE :periode')
                   ->setParameter('periode', '%' . $periode . '%');
            }
           
            if($key && $key !== '') {
                $qb->andWhere('c.description LIKE :key')
                    ->setParameter('key', '%' . $key . '%');
            }

            if($localisation && $localisation !== '') {
                $qb->andWhere('c.localisation LIKE :localisation')
                    ->setParameter('localisation', '%' . $localisation . '%');
            }
            
            if($date && $date !== '') {
                $qb->andWhere('c.date LIKE :date')
                    ->setParameter('date', '%' . $date . '%');
            }

                  
         return $qb->getQuery()->getResult();

    }
}
