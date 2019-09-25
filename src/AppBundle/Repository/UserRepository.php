<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

	public function getUserByRole($user)
	{
        $qb = $this->_em->createQueryBuilder();
        $qb->select('u')
            ->from(User::class, 'u')
            ->where('u.id != :user')
            ->andWhere('u.roles LIKE :role1 OR u.roles LIKE :role2')
			->setParameter('role1', '%{}%')
			->setParameter('role2', '%"ROLE_CHEF"%')
            ->setParameter('user', $user)
        ;

        return $qb->getQuery()->getResult();
	}

	public function nombreDutilisateur()
	{
		$qb = $this->_em->createQueryBuilder();
		$qb->select('COUNT(u)')
			->from(User::class, 'u');

		return $qb->getQuery()->getSingleScalarResult();
	}

}
