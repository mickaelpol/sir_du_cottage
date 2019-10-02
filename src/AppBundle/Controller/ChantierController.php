<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\ColorisParquet;
use AppBundle\Entity\CommentaireChantier;
use AppBundle\Entity\SupplementParquet;
use AppBundle\Entity\SupplementTerrasse;
use AppBundle\Entity\User;
use AppBundle\Form\AddColorisBienForm;
use AppBundle\Form\ChantierEditType;
use AppBundle\Form\DeleteMultipleChantierType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Constante\NotificationConstate as notif;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Chantier controller.
 *
 * @Route("chantier")
 */
class ChantierController extends Controller
{

	/**
	 * @Route(path="/get_form_multiple_delete_chantier", name="get_form_multiple_delete_chantier", methods={"GET", "POST"})
	 * @param Request $request
	 * @return Response
	 */
	public function getFormDeleteChantierAjax(Request $request)
	{
		$form = $this->createForm(DeleteMultipleChantierType::class, []);

		$form->handleRequest($request);

		if ($form->isValid() && $form->isSubmitted()) {
			$em = $this->getDoctrine()->getManager();
			$collectionChantiers = $form->getData();
			foreach ($collectionChantiers as $arrChantier) {
				foreach ($arrChantier as $chantier) {
					if (!is_object($chantier)) {
						throw new AccessDeniedException('This parameters isn\'t an object');
					}
					$em->remove($chantier);
					$this->addFlash(
						'success',
						sprintf('Le chantier %s à bien été supprimé', $chantier)
					);
				}
			}
			$em->flush();
			return $this->redirectToRoute('chantier_index');
		}

		return $this->render('form/form_delete_multiple_chantier.html.twig', [
			'form' => $form->createView(),
		]);
	}

	/**
	 * Lists all chantier entities.
	 * @Route(path="/", name="chantier_index", methods={"GET"})
	 * @Security("is_granted('ROLE_CHEF')")
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$chantiers = $em->getRepository('AppBundle:Chantier')->findAll();

		return $this->render('chantier/index.html.twig', array(
			'chantiers' => $chantiers,
		));
	}

	/**
	 * Creates a new chantier entity.
	 * @Route(path="/new", name="chantier_new", methods={"GET", "POST"})
	 * @Security("is_granted('ROLE_CHEF')")
	 * @param Request $request
	 * @return RedirectResponse|Response
	 */
	public function newAction(Request $request)
	{
		$chantier = new Chantier();
		$form = $this->createForm('AppBundle\Form\ChantierType', $chantier);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$nombreBiens = $chantier->getNombreBiens();
			$postChantier = $_POST['appbundle_chantier'];
			$trueParquet = (int)$postChantier['messageParquet'];
			$trueTerrasse = (int)$postChantier['messageTerrasse'];

			// Si les checkbox parquet et terrasse sont coché
			if ($trueParquet === 1 && $trueTerrasse === 1) {
				for ($i = 0; $i < $nombreBiens; $i++) {
					$bien = new Bien();
					$bien
						->setNom('Bien ' . $i)
						->setPreparationParquet(0)
						->setParquetParquet(0)
						->setPlintheParquet(0)
						->setAcryliqueParquet(0)
						->setSeuilParquet(0)
						->setSuperficieParquet(0)
						->setCadreTerrasse(0)
						->setPlatelageTerrasse(0)
						->setVissageTerrasse(0)
						->setSuperficieTerrasse(0)
						->setChantier($chantier);

					// Supplément terrasse remplis par défaut
					if (array_key_exists('supplementTerrasse', $postChantier)) {
						$suppTerrasse = $postChantier['supplementTerrasse'];

						for ($j = 0; $j < count($suppTerrasse); $j++) {
							$newSuppTerrasse = new SupplementTerrasse();
							$newSuppTerrasse->setEtat(0);
							$newSuppTerrasse->setDesignation($suppTerrasse[$j]);
							$newSuppTerrasse->setBien($bien);
							$em->persist($newSuppTerrasse);
						}
					}

					// Si des supplément terrasse sont renseigné
					if (array_key_exists('ajoutManuelSuppTerrasses', $postChantier)) {
						$ajoutSuppTerrasse = $postChantier['ajoutManuelSuppTerrasses'];
						foreach ($ajoutSuppTerrasse as $ajoutTerrasse) {
							$newSuppTerrasseManual = new SupplementTerrasse();
							$newSuppTerrasseManual->setBien($bien);
							$newSuppTerrasseManual->setDesignation($ajoutTerrasse);
							$newSuppTerrasseManual->setEtat(0);
							$em->persist($newSuppTerrasseManual);
						}
					}

					// Si des supplément parquet sont renseigné
					if (array_key_exists('ajoutManuelSuppParquets', $postChantier)) {
						$ajoutSuppParquet = $postChantier['ajoutManuelSuppParquets'];
						foreach ($ajoutSuppParquet as $ajoutParquet) {
							$newSuppParquetManual = new SupplementParquet();
							$newSuppParquetManual->setBien($bien);
							$newSuppParquetManual->setDesignation($ajoutParquet);
							$newSuppParquetManual->setEtat(0);
							$em->persist($newSuppParquetManual);
						}
					}

					// Supplément parquet par défaut
					if (array_key_exists('supplementParquet', $postChantier)) {
						$suppParquet = $postChantier['supplementParquet'];

						for ($k = 0; $k < count($suppParquet); $k++) {
							$newSuppParquet = new SupplementParquet();
							$newSuppParquet->setEtat(0);
							$newSuppParquet->setDesignation($suppParquet[$k]);
							$newSuppParquet->setBien($bien);
							$em->persist($newSuppParquet);
						}
					}

					$em->persist($bien);
				}

			}
			// Si la checkbox terrasse est coché
			if ($trueTerrasse === 1 && $trueParquet === 0) {
				$bien = new Bien();
				for ($i = 0; $i < $nombreBiens; $i++) {

					$bien = new Bien();
					$bien
						->setNom('Bien ' . $i)
						->setPreparationParquet(0)
						->setParquetParquet(0)
						->setPlintheParquet(0)
						->setAcryliqueParquet(0)
						->setSeuilParquet(0)
						->setSuperficieParquet(0)
						->setCadreTerrasse(0)
						->setPlatelageTerrasse(0)
						->setVissageTerrasse(0)
						->setSuperficieTerrasse(0)
						->setChantier($chantier);

					// Supplément terrasse remplis par défaut
					if (array_key_exists('supplementTerrasse', $postChantier)) {
						$suppTerrasse = $postChantier['supplementTerrasse'];

						for ($j = 0; $j < count($suppTerrasse); $j++) {
							$newSuppTerrasse = new SupplementTerrasse();
							$newSuppTerrasse->setEtat(0);
							$newSuppTerrasse->setDesignation($suppTerrasse[$j]);
							$newSuppTerrasse->setBien($bien);
							$em->persist($newSuppTerrasse);
						}
					}

					// Si des supplément terrasse sont renseigné
					if (array_key_exists('ajoutManuelSuppTerrasses', $postChantier)) {
						$ajoutSuppTerrasse = $postChantier['ajoutManuelSuppTerrasses'];
						foreach ($ajoutSuppTerrasse as $ajoutTerrasse) {
							$newSuppTerrasseManual = new SupplementTerrasse();
							$newSuppTerrasseManual->setBien($bien);
							$newSuppTerrasseManual->setDesignation($ajoutTerrasse);
							$newSuppTerrasseManual->setEtat(0);
							$em->persist($newSuppTerrasseManual);
						}
					}

					$em->persist($bien);
				}
			}

			// Si la checkbox parquet est coché
			if ($trueParquet === 1 && $trueTerrasse === 0) {
				$bien = new Bien();
				for ($i = 0; $i < $nombreBiens; $i++) {

					$bien = new Bien();
					$bien
						->setNom('Bien ' . $i)
						->setPreparationParquet(0)
						->setParquetParquet(0)
						->setPlintheParquet(0)
						->setAcryliqueParquet(0)
						->setSeuilParquet(0)
						->setSuperficieParquet(0)
						->setCadreTerrasse(0)
						->setPlatelageTerrasse(0)
						->setVissageTerrasse(0)
						->setSuperficieTerrasse(0)
						->setChantier($chantier);

					// Si les fonds de placards sont coché on les ajoutes à chacun des biens du chantier
					if (array_key_exists('supplementParquet', $postChantier)) {
						$suppParquet = $postChantier['supplementParquet'];
						for ($k = 0; $k < count($suppParquet); $k++) {
							$newSuppParquet = new SupplementParquet();
							$newSuppParquet->setEtat(0);
							$newSuppParquet->setDesignation($suppParquet[$k]);
							$newSuppParquet->setBien($bien);
							$em->persist($newSuppParquet);
						}
					}


					// Si des supplément parquet sont renseigné
					if (array_key_exists('ajoutManuelSuppParquets', $postChantier)) {
						$ajoutSuppParquet = $postChantier['ajoutManuelSuppParquets'];
						foreach ($ajoutSuppParquet as $ajoutParquet) {
							$newSuppParquetManual = new SupplementParquet();
							$newSuppParquetManual->setBien($bien);
							$newSuppParquetManual->setDesignation($ajoutParquet);
							$newSuppParquetManual->setEtat(0);
							$em->persist($newSuppParquetManual);
						}
					}

					$em->persist($bien);
				}
			}
			$em->persist($chantier);
			$em->flush();

			$this->addFlash(
				notif::SUCCESS,
				sprintf('Le chantier %s à bien été créer !', $chantier)
			);

			return $this->redirectToRoute('chantier_show', array('id' => $chantier->getId()));
		}

		return $this->render('chantier/new.html.twig', array(
			'chantier' => $chantier,
			'form'     => $form->createView(),
		));
	}

	private function valuePourcentagePropriete($prop)
	{
		switch ($prop) {
			case 0:
				$prop = 0;
				break;
			case 1:
				$prop = 50;
				break;
			case 2:
				$prop = 100;
				break;
		}
		return $prop;
	}

	/**
	 * Finds and displays a chantier entity.
	 * @Route(path="/{id}", name="chantier_show", methods={"GET", "POST"})
	 * @Security("is_granted('ROLE_CHEF')")
	 * @param Chantier $chantier
	 * @param Request $request
	 * @return Response
	 */
	public function showAction(Chantier $chantier, Request $request)
	{
		$form_edit = $this->createForm(ChantierEditType::class, $chantier);
		$form_edit->handleRequest($request);
		$biens = $chantier->getBiens();
		$oneBien = '';
		$chantierType = $chantier->getType();
		$nombreProprieteParBien = 0;
		$pourcentageAvancementBien = [];

		foreach ($biens as $bien) {
			$oneBien = $bien;
			$nombrePropParquets = 5;
			$nombrePropTerrasses = 3;
			$nombrePropSuppParquets = (int)count($oneBien->getSupplementParquets());
			$nombrePropSuppTerrasses = (int)count($oneBien->getSupplementTerrasses());

			$totalPourcentagePropriete = 0;
			$propCadreTerrasse = $this->valuePourcentagePropriete($bien->getCadreTerrasse());
			$propPlatelageTerrasse = $this->valuePourcentagePropriete($bien->getPlatelageTerrasse());
			$propVissageTerrasse = $this->valuePourcentagePropriete($bien->getVissageTerrasse());
			$propPreparationParquet = $this->valuePourcentagePropriete($bien->getPreparationParquet());
			$propParquet = $this->valuePourcentagePropriete($bien->getParquetParquet());
			$propPlinthe = $this->valuePourcentagePropriete($bien->getPlintheParquet());
			$propAcrylique = $this->valuePourcentagePropriete($bien->getAcryliqueParquet());
			$propSeuil = $this->valuePourcentagePropriete($bien->getSeuilParquet());

			if ($chantierType === 'Terrasse') {
				$nombreProprieteParBien = $nombrePropTerrasses + $nombrePropSuppTerrasses;
				$totalPourcentagePropriete = $propCadreTerrasse + $propPlatelageTerrasse + $propVissageTerrasse;

				$valeurSuppTerrasse = 0;
				foreach ($bien->getSupplementTerrasses() as $supp) {
					$valeurSuppTerrasse += $this->valuePourcentagePropriete($supp->getEtat());
				}
				$calculPourcentage = (int)ceil(($totalPourcentagePropriete + $valeurSuppTerrasse) / $nombreProprieteParBien);
				array_push($pourcentageAvancementBien, $calculPourcentage);
			} elseif ($chantierType === 'Parquet') {
				$nombreProprieteParBien = $nombrePropParquets + $nombrePropSuppParquets;
				$totalPourcentagePropriete = $propPreparationParquet + $propParquet + $propPlinthe + $propAcrylique + $propSeuil;

				$valeurSuppParquet = 0;
				foreach ($bien->getSupplementParquets() as $supp) {
					$valeurSuppParquet += $this->valuePourcentagePropriete($supp->getEtat());
				}
				$calculPourcentage = (int)ceil(($totalPourcentagePropriete + $valeurSuppParquet) / $nombreProprieteParBien);
				array_push($pourcentageAvancementBien, $calculPourcentage);

			} elseif ($chantierType === 'Terrasse / Parquet') {
				$nombreProprieteParBien = $nombrePropTerrasses + $nombrePropSuppTerrasses + $nombrePropParquets + $nombrePropSuppParquets;
				$totalPourcentagePropriete = $propCadreTerrasse + $propPlatelageTerrasse + $propVissageTerrasse + $propPreparationParquet + $propParquet + $propPlinthe + $propAcrylique + $propSeuil;

				$valeurSuppParquet = 0;
				$valeurSuppTerrasse = 0;
				$valeurSuppDesDeux = 0;
				foreach ($bien->getSupplementParquets() as $suppP) {
					$valeurSuppParquet += $this->valuePourcentagePropriete($suppP->getEtat());
				}
				foreach ($bien->getSupplementTerrasses() as $suppT) {
					$valeurSuppTerrasse += $this->valuePourcentagePropriete($suppT->getEtat());
				}
				$valeurSuppDesDeux = $totalPourcentagePropriete + $valeurSuppTerrasse + $valeurSuppParquet;
				$calculPourcentage = (int)ceil($valeurSuppDesDeux / $nombreProprieteParBien);
				array_push($pourcentageAvancementBien, $calculPourcentage);
			}
		}

		$sommeAvancementBien = 0;
		$pourcentageAvancementChantier = 0;

		if (count($chantier->getBiens()) === 1) {
			$pourcentageAvancementChantier = ceil($pourcentageAvancementBien[0]);
		} else {
			for ($j = 0; $j < $chantier->getNombreBiens(); $j++) {
				$sommeAvancementBien += $pourcentageAvancementBien[$j];
			}
			$pourcentageAvancementChantier = ceil($sommeAvancementBien / $chantier->getNombreBiens());
		}


		if ($form_edit->isSubmitted() && $form_edit->isValid()) {
			$donneesChantier = $form_edit->getData();
			$form_biens = $donneesChantier->getBiens();

			$em = $this->getDoctrine()->getManager();
			$chantier->setPourcentage($pourcentageAvancementChantier);
			$em->persist($chantier);
			$em->flush();

			$this->addFlash(
				notif::INFO,
				sprintf('Les changements sur le chantier %s ont bien été pris en compte', $chantier)
			);
		}

		return $this->render('chantier/show.html.twig', array(
			'chantier'     => $chantier,
			'biens'        => $biens,
			'oneBien'      => $oneBien,
			'form'         => $form_edit->createView(),
			'pourcentages' => $pourcentageAvancementBien,
		));
	}

	/**
	 * @Route(path="/remove/{id}", name="chantier_remove")
	 * @Security("is_granted('ROLE_DIRECTEUR')")
	 *
	 * @param $id
	 * @return RedirectResponse
	 */
	public function remove($id)
	{
		if ($this->getUser()) {
			$em = $this->getDoctrine()->getManager();
			$chantier = $em->getRepository(Chantier::class)->find($id);

			if ($chantier) {
				$em->remove($chantier);
				$em->flush();
			}

			$this->addFlash(
				notif::DANGER,
				sprintf('Le chantier %s à bien été supprimé !', $chantier)
			);
		}

		return $this->redirectToRoute('chantier_index');

	}
}
