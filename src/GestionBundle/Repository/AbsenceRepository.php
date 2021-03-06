<?php

namespace GestionBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AbsenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AbsenceRepository extends EntityRepository
{

    function absenceCount($month){
        $qb = $this->createQueryBuilder('a');

        $qb->select('count(a)');

        $year = date("Y");



        $qb->where("a.dateDebut >= '$year-$month-01'");
        $qb->andWhere("a.dateFin <= '$year-$month-31'");

        return $qb->getQuery()->getSingleScalarResult();
    }
}
