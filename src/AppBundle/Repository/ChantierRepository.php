<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Chantier;
use Doctrine\Common\Cache\ApcuCache;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping;

/**
 * ChantierRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChantierRepository extends \Doctrine\ORM\EntityRepository
{
	CONST MAX_RESULT = 4;

	public function nombreChantiers()
	{
		$qb = $this->_em->createQueryBuilder();

		$qb->select('COUNT(c)')
			->from(Chantier::class, 'c');

		return $qb->getQuery()->getSingleScalarResult();
	}

	public function quattreChantierPlusAvancer()
	{
		$qb = $this->createQueryBuilder('c');
		$qb
			->orderBy('c.pourcentage', 'DESC')
			->setMaxResults(self::MAX_RESULT);
		return $qb->getQuery()->getResult();
	}

}
