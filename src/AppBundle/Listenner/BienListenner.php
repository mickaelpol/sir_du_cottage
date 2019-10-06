<?php


namespace AppBundle\Listenner;


use AppBundle\Entity\Bien;
use AppBundle\Services\PersistFlushWithUpdateCacheService;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class BienListenner
{
	/**
	 * @var TokenStorage
	 */
	private $tokenStorage;

	/**
	 * @var PersistFlushWithUpdateCacheService
	 */
	private $service;

	/**
	 * BienListenner constructor.
	 * @param TokenStorage $tokenStorage
	 * @param PersistFlushWithUpdateCacheService $service
	 */
	public function __construct(TokenStorage $tokenStorage, PersistFlushWithUpdateCacheService $service)
	{
		$this->tokenStorage = $tokenStorage;
		$this->service = $service;
	}

	/**
	 * @param Bien $bien
	 * @param LifecycleEventArgs $event
	 * @throws \Doctrine\ORM\OptimisticLockException
	 */
	public function postUpdate(Bien $bien, LifecycleEventArgs $event)
	{
		$user = $this->tokenStorage->getToken()->getUser()->getUsername();
		$object = $this->service->getObject(Bien::class, $bien);
		$this->service->compareData($object, $user);
		$this->service->sauvegardeDatasUpdateCache($object, [
			'[AppBundle\Entity\Bien$CLASSMETADATA][1]',
			'[quattre_chantier_plus_avancer_cache][1]',
			'[AppBundle\Entity\Chantier$CLASSMETADATA][1]',
		]);
	}

}