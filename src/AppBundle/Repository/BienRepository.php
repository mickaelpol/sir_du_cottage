<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Bien;

/**
 * BienRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BienRepository extends \Doctrine\ORM\EntityRepository
{

	public function nombreBiens()
	{
		$qb = $this->getEntityManager()->createQuery(
			'SELECT COUNT(b) FROM AppBundle:Bien b'
		);
		$qb->useResultCache(true, 3600, 'nombre_biens_cache');

		return $qb->getResult();
	}

	public function getBienAsChantier($chantier)
	{
		$qb = $this->_em->createQueryBuilder();

		$qb->select('b')
			->from(Bien::class, 'b')
			->where('b.chantier = :chantier')
			->setParameter('chantier', $chantier)
			->setMaxResults(1);

		return $qb->getQuery()->getSingleResult();
	}
}
