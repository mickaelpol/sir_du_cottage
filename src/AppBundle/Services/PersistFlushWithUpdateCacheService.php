<?php


namespace AppBundle\Services;


use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\SupplementParquet;
use AppBundle\Entity\SupplementTerrasse;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\PersistentCollection;
use Predis\Client;
use Symfony\Component\HttpFoundation\RequestStack;

class PersistFlushWithUpdateCacheService
{

	CONST PROPRIETE = 'utilisateur';

	/**
	 * @var EntityManager
	 */
	private $em;

	/**
	 * @var Client
	 */
	private $client;
	/**
	 * @var RequestStack
	 */
	private $requestStack;

	/**
	 * Le constructeur permet d'instancier l'entity manager de doctrine et le cache de redis
	 * PersistFlushWithUpdateCacheService constructor.
	 * @param EntityManager $em
	 * @param Client $client
	 * @param RequestStack $requestStack
	 */
	public function __construct(EntityManager $em, Client $client, RequestStack $requestStack)
	{
		$this->em = $em;
		$this->client = $client;
		$this->requestStack = $requestStack;
	}

	private function getRouteParSubstring($route)
	{
		$expl = explode("\\", $route);
		$attributes = explode("::", $expl[2]);
		$methode = $attributes[1];

		return $methode;
	}

	/**
	 * Cette fonction permet d'update l'objet passé en parametre et de renouveler le cache afin d'afficher les bonne donées mise à jour
	 * @param $object
	 * @param array $tabKeyCache
	 * @return mixed
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
	public function sauvegardeDatasUpdateCache($object, $tabKeyCache = [])
	{
		$request = $this->requestStack->getMasterRequest();
		$controller = $request->attributes->get('_controller');
		$em = $this->em;
		$uow = $em->getUnitOfWork();
		$entityUpdated = $uow->getScheduledEntityUpdates();

		/* 1 er cas verifier que l'instance passé est un bien */
		foreach ($entityUpdated as $entity) {
			if ($entity instanceof  Bien) {
				$object = $entity;
				$uow->persist($object);
//				dump($object);
//				$em->persist($object);
			} elseif ($entity instanceof SupplementTerrasse) {
				$object = $entity->getBien();
				$em->persist($object);
			} elseif ($entity instanceof SupplementParquet) {
				$object = $entity->getBien();
				$em->persist($object);
			} elseif ($entity instanceof Chantier) {
				$object = $entity;
				$em->persist($object);
			}
		}
		$this->em->flush();

		$cache = $this->client;
		foreach ($tabKeyCache as $key) {
			$cache->expire($key, 0);
		}
//		if ($this->getRouteParSubstring($controller) !== "remove") {
//			$em->persist($object);
//			$em->flush();
//			foreach ($tabKeyCache as $key) {
//				$cache->expire($key, 0);
//			}
//		}

		return $object;
	}

	/**
	 * Ceci permet de retourner l'object de la base de données
	 * @param $class
	 * @param $object
	 * @return object|null
	 */
	public function getObject($class, $object)
	{
		$em = $this->em;
		$entity = $em->getRepository($class)->find($object);

		return $entity;
	}

	/**
	 * Cette fonction convertis en getteur la chaine de caractère passé en parametre
	 * @param $string
	 * @return string
	 */
	private function convertGetteur($string)
	{
		$methode = 'get' . ucfirst($string);
		return $methode;
	}

	/**
	 * Cette fonction convertis en setteur la chaine de caractère passé en parametre
	 * @param $string
	 * @return string
	 */
	public function convertSetteur($string)
	{
		$methode = 'set' . ucfirst($string);
		return $methode;
	}

	/**
	 * Cette fonction permet de comparer l'utilisateur lié à l'objet et l'utilisateur courant
	 * @param $object
	 * @param $user
	 * @return mixed
	 */
	public function compareData($object, $user)
	{
		$getteur = $this->convertGetteur(self::PROPRIETE);
		$userOfObject = $object->$getteur();

		if ($userOfObject !== $user) {
			$setteur = $this->convertSetteur(self::PROPRIETE);
			$object->$setteur($user);
		}

		return $object;
	}

}