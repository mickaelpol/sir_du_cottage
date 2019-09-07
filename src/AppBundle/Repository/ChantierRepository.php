<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Chantier;

/**
 * ChantierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChantierRepository extends \Doctrine\ORM\EntityRepository
{

	public function nombreChantiers()
	{
		$qb = $this->_em->createQueryBuilder();

		$qb->select('COUNT(c)')
			->from(Chantier::class, 'c');

		return $qb->getQuery()->getSingleScalarResult();
	}

}
