<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\SupplementParquet;
use AppBundle\Entity\SupplementTerrasse;
use AppBundle\Form\ChantierEditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Chantier controller.
 *
 * @Route("chantier")
 */
class ChantierController extends Controller
{
	/**
	 * Lists all chantier entities.
	 * @Route(path="/", name="chantier_index", methods={"GET"})
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
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
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
					$suppTerrasse = $postChantier['supplementTerrasse'];

					for ($j = 0; $j < count($suppTerrasse); $j++) {
						$newSuppTerrasse = new SupplementTerrasse();
						$newSuppTerrasse->setEtat(0);
						$newSuppTerrasse->setDesignation($suppTerrasse[$j]);
						$newSuppTerrasse->setBien($bien);
						$em->persist($newSuppTerrasse);
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
					$suppParquet = $postChantier['supplementParquet'];

					for ($k = 0; $k < count($suppParquet); $k++) {
						$newSuppParquet = new SupplementParquet();
						$newSuppParquet->setEtat(0);
						$newSuppParquet->setDesignation($suppParquet[$k]);
						$newSuppParquet->setBien($bien);
						$em->persist($newSuppParquet);
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
					$suppTerrasse = $postChantier['supplementTerrasse'];

					for ($j = 0; $j < count($suppTerrasse); $j++) {
						$newSuppTerrasse = new SupplementTerrasse();
						$newSuppTerrasse->setEtat(0);
						$newSuppTerrasse->setDesignation($suppTerrasse[$j]);
						$newSuppTerrasse->setBien($bien);
						$em->persist($newSuppTerrasse);
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

					$suppParquet = $postChantier['supplementParquet'];

					for ($k = 0; $k < count($suppParquet); $k++) {
						$newSuppParquet = new SupplementParquet();
						$newSuppParquet->setEtat(0);
						$newSuppParquet->setDesignation($suppParquet[$k]);
						$newSuppParquet->setBien($bien);
						$em->persist($newSuppParquet);
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

			return $this->redirectToRoute('chantier_show', array('id' => $chantier->getId()));
		}

		return $this->render('chantier/new.html.twig', array(
			'chantier' => $chantier,
			'form'     => $form->createView(),
		));
	}

	/**
	 * Finds and displays a chantier entity.
	 * @Route(path="/{id}", name="chantier_show", methods={"GET"})
	 * @param Chantier $chantier
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function showAction(Chantier $chantier, Request $request)
	{
		$form_edit = $this->createForm(ChantierEditType::class, $chantier);
		$form_edit->handleRequest($request);
		$deleteForm = $this->createDeleteForm($chantier);
		$biens = $chantier->getBiens();
		$oneBien = '';

		foreach ($biens as $bien) {
			$oneBien = $bien;
		}

		if ($form_edit->isSubmitted() && $form_edit->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($chantier);
			$em->flush();
		}

		return $this->render('chantier/show.html.twig', array(
			'chantier'    => $chantier,
			'oneBien'   => $oneBien,
			'form'        => $form_edit->createView(),
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Displays a form to edit an existing chantier entity.
	 * @Route(path="/{id}/edit", name="chantier_edit", methods={"GET", "POST"})
	 * @param Request $request
	 * @param Chantier $chantier
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function editAction(Request $request, Chantier $chantier)
	{
		$deleteForm = $this->createDeleteForm($chantier);
		$editForm = $this->createForm('AppBundle\Form\ChantierType', $chantier);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('chantier_edit', array('id' => $chantier->getId()));
		}

		return $this->render('chantier/edit.html.twig', array(
			'chantier'    => $chantier,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Deletes a chantier entity.
	 * @Route(path="/{id}", name="chantier_delete", methods={"DELETE"})
	 */
	public function deleteAction(Request $request, Chantier $chantier)
	{
		$form = $this->createDeleteForm($chantier);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($chantier);
			$em->flush();
		}

		return $this->redirectToRoute('chantier_index');
	}

	/**
	 * Creates a form to delete a chantier entity.
	 *
	 * @param Chantier $chantier The chantier entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Chantier $chantier)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('chantier_delete', array('id' => $chantier->getId())))
			->setMethod('DELETE')
			->getForm();
	}
}
