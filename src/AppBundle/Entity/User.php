<?php

namespace AppBundle\Entity;

use AppBundle\Entity\CommentaireChantier;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="use_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\AttributeOverrides({
 *     @ORM\AttributeOverride(name="email", column=@ORM\Column(nullable=true)),
 *     @ORM\AttributeOverride(name="emailCanonical", column=@ORM\Column(nullable=true)),
 *     })
 */
class User extends BaseUser
{

	CONST DIRECTEUR = 'Directeur';
	CONST SUPER_ADMIN = 'Super Administrateur';
	CONST ROLE_ADMIN = 'Administrateur';
	CONST CHEF = 'Chef d\'équipe';
	CONST OUVRIER = 'Ouvrier';

	/**
	 * @var int
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Get id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	public function getFirstRole(User $user)
	{
		$arrayRoles = $user->getRoles();
		$firstRole = reset($arrayRoles);
		$roleString = '';
		if ($firstRole === 'ROLE_DIRECTEUR') {
			$roleString = self::DIRECTEUR;
		} elseif ($firstRole === 'ROLE_CHEF') {
			$roleString = self::CHEF;
		}elseif ($firstRole === 'ROLE_SUPER_ADMIN') {
			$roleString = self::SUPER_ADMIN;
		}elseif ($firstRole === 'ROLE_ADMIN') {
			$roleString = self::ROLE_ADMIN;
		} else {
			$roleString = self::OUVRIER;
		}
		return $roleString;
	}
}
