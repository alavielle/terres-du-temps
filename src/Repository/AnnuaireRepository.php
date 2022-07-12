<?php

namespace App\Repository;

use App\Entity\Annuaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Annuaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annuaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annuaire[]    findAll()
 * @method Annuaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnuaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annuaire::class);
    }

    
    public function findOneByIsHomePage(): ?Annuaire
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.is_in_home_page = :val')
            ->setParameter('val', true)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
