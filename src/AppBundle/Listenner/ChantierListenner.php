<?php


namespace AppBundle\Listenner;

use AppBundle\Entity\Chantier;
use AppBundle\Services\PersistFlushWithUpdateCacheService;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;


class ChantierListenner
{

	/**
	 * @var PersistFlushWithUpdateCacheService
	 */
	private $service;

	public function __construct(PersistFlushWithUpdateCacheService $service)
	{
		$this->service = $service;
	}

	public function postPersist(Chantier $chantier, LifecycleEventArgs $args)
	{
		$this->service->sauvegardeDatasUpdateCache($chantier, [
			'[liste_chantier_cache][1]',
			'[nombre_chantiers_cache][1]',
			'[nombre_biens_cache][1]',
			'[quattre_chantier_plus_avancer_cache][1]',
			'[AppBundle\Entity\Bien$CLASSMETADATA][1]',
			'[AppBundle\Entity\Chantier$CLASSMETADATA][1]',
		]);
	}

	public function postUpdate(Chantier $chantier, LifecycleEventArgs $args)
	{
		$this->service->sauvegardeDatasUpdateCache($chantier, [
			'[liste_chantier_cache][1]',
			'[nombre_chantiers_cache][1]',
			'[nombre_biens_cache][1]',
			'[quattre_chantier_plus_avancer_cache][1]',
		]);
	}

	public function postRemove(Chantier $chantier, LifecycleEventArgs $args)
	{
		$this->service->sauvegardeDatasUpdateCache($chantier, [
			'[liste_chantier_cache][1]',
			'[nombre_chantiers_cache][1]',
			'[nombre_biens_cache][1]',
			'[quattre_chantier_plus_avancer_cache][1]',
		]);
	}

}