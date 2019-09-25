<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\SupplementParquet;
use AppBundle\Entity\SupplementTerrasse;
use AppBundle\Form\AddMultipleBienAjaxForm;
use AppBundle\Form\AjoutParquetBienAjaxForm;
use AppBundle\Form\BienType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Constante\NotificationConstate as notif;

/**
 * Bien controller.
 *
 * @Route("bien")
 */
class BienController extends Controller
{
	/**
	 * Lists all bien entities.
	 *
	 * @Route("/", name="bien_index")
	 * @Method("GET")
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$biens = $em->getRepository('AppBundle:Bien')->findAll();

		return $this->render('bien/index.html.twig', array(
			'biens' => $biens,
		));
	}

	/**
	 * Creates a new bien entity.
	 *
	 * @Route("/new", name="bien_new")
	 * @Method({"GET", "POST"})
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function newAction(Request $request)
	{
		$bien = new Bien();
		$form = $this->createForm(BienType::class, $bien);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($bien);
			$em->flush();

			return $this->redirectToRoute('bien_show', array('id' => $bien->getId()));
		}

		return $this->render('bien/new.html.twig', array(
			'bien' => $bien,
			'form' => $form->createView(),
		));
	}

	/**
	 * Finds and displays a bien entity.
	 *
	 * @Route("/{id}", name="bien_show")
	 * @Method("GET")
	 */
	public function showAction(Bien $bien)
	{
		$deleteForm = $this->createDeleteForm($bien);

		return $this->render('bien/show.html.twig', array(
			'bien'        => $bien,
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Displays a form to edit an existing bien entity.
	 *
	 * @Route("/{id}/edit", name="bien_edit")
	 * @Method({"GET", "POST"})
	 */
	public function editAction(Request $request, Bien $bien)
	{
		$deleteForm = $this->createDeleteForm($bien);
		$editForm = $this->createForm('AppBundle\Form\BienType', $bien);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('bien_edit', array('id' => $bien->getId()));
		}

		return $this->render('bien/edit.html.twig', array(
			'bien'        => $bien,
			'edit_form'   => $editForm->createView(),
			'delete_form' => $deleteForm->createView(),
		));
	}

	/**
	 * Deletes a bien entity.
	 *
	 * @Route("/{id}", name="bien_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, Bien $bien)
	{
		$form = $this->createDeleteForm($bien);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->remove($bien);
			$em->flush();
		}

		return $this->redirectToRoute('bien_index');
	}

	/**
	 * Creates a form to delete a bien entity.
	 *
	 * @param Bien $bien The bien entity
	 *
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm(Bien $bien)
	{
		return $this->createFormBuilder()
			->setAction($this->generateUrl('bien_delete', array('id' => $bien->getId())))
			->setMethod('DELETE')
			->getForm();
	}

	/**
	 * @Route(path="/get_form_bien/{id}", name="get_form_bien", condition="request.isXmlHttpRequest()")
	 * @param Chantier $chantier
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getFormAjoutBienAjax(Chantier $chantier, Request $request)
	{
		$form = $this->createForm(AddMultipleBienAjaxForm::class, $chantier, [
			'action' => $this->generateUrl('get_form_bien', ['id' => $request->get('id')]),
			'chantier'     => $chantier,
		]);

		return $this->render('form/ajout_bien_form.html.twig', [
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route(path="/send_form_bien/{id}", name="send_form_bien", condition="request.isXmlHttpRequest()")
	 * @param Chantier $chantier
	 * @param Request $request
	 * @return JsonResponse
	 */
	public function getResultFormAjoutBienAjax(Chantier $chantier, Request $request)
	{
		if ($request) {
			if ($request->isXMLHttpRequest()) {
				$em = $this->getDoctrine()->getManager();
				$erChantier = $em->getRepository(Chantier::class);
				$erBien = $em->getRepository(Bien::class);
				$form = $request->request->all();
				$arr = $form['appbundle_chantier'];
				$biens = $arr['biens'];
				$typeChantier = $chantier->getType();

				foreach ($biens as $bien) {
					$bienId = $bien['id'];
					$bienNom = $bien['nom'];
					$entity = $erBien->find($bienId);
					$existantBiens = $erBien->getBienAsChantier($chantier);

					// Création d'un bien
					if ($entity === null) {
						$newBien = new Bien();
						$newBien->setNom($bienNom);
						$newBien->setChantier($chantier);
						$newBien
							->setPreparationParquet(0)
							->setParquetParquet(0)
							->setPlintheParquet(0)
							->setAcryliqueParquet(0)
							->setSeuilParquet(0)
							->setCadreTerrasse(0)
							->setPlatelageTerrasse(0)
							->setVissageTerrasse(0);
						if ($typeChantier === 'Terrasse') {
							$bienSuperficieTerrasse = $bien['superficieTerrasse'];
							$suppTerrasses = $existantBiens->getSupplementTerrasses();
							$newBien->setSuperficieTerrasse($bienSuperficieTerrasse);
							$newBien->setSuperficieParquet(0);
							foreach ($suppTerrasses as $suppTerrasse) {
								if (!empty($suppTerrasse->getDesignation())) {
									$newSuppTerrasse = new SupplementTerrasse();
									$newSuppTerrasse->setDesignation($suppTerrasse->getDesignation());
									$newSuppTerrasse->setEtat(0);
									$newSuppTerrasse->setBien($newBien);
									$newBien->addSupplementTerrass($newSuppTerrasse);
								}
								$em->persist($newBien);
							}
							$em->flush($newBien);
						} elseif ($typeChantier === 'Parquet') {
							$bienSuperficieParquet = $bien['superficieParquet'];
							$suppParquets = $existantBiens->getSupplementParquets();
							$newBien->setSuperficieTerrasse(0);
							$newBien->setSuperficieParquet($bienSuperficieParquet);
							foreach ($suppParquets as $suppParquet) {
								if (!empty($suppParquet->getDesignation())) {
									$newSuppParquet = new SupplementParquet();
									$newSuppParquet->setDesignation($suppParquet->getDesignation());
									$newSuppParquet->setEtat(0);
									$newSuppParquet->setBien($newBien);
									$newBien->addSupplementParquet($newSuppParquet);
								}
								$em->persist($newBien);
							}
							$em->flush($newBien);
						} else {
							$bienSuperficieParquet = $bien['superficieParquet'];
							$bienSuperficieTerrasse = $bien['superficieTerrasse'];
							$suppParquets = $existantBiens->getSupplementParquets();
							$suppTerrasses = $existantBiens->getSupplementTerrasses();
							$newBien->setSuperficieTerrasse($bienSuperficieTerrasse);
							$newBien->setSuperficieParquet($bienSuperficieParquet);
							foreach ($suppParquets as $suppParquet) {
								if (!empty($suppParquet->getDesignation())) {
									$newSuppParquet = new SupplementParquet();
									$newSuppParquet->setDesignation($suppParquet->getDesignation());
									$newSuppParquet->setEtat(0);
									$newSuppParquet->setBien($newBien);
									$newBien->addSupplementParquet($newSuppParquet);
								}
								$em->persist($newBien);
							}
							foreach ($suppTerrasses as $suppTerrasse) {
								if (!empty($suppTerrasse->getDesignation())) {
									$newSuppTerrasse = new SupplementTerrasse();
									$newSuppTerrasse->setDesignation($suppTerrasse->getDesignation());
									$newSuppTerrasse->setEtat(0);
									$newSuppTerrasse->setBien($newBien);
									$newBien->addSupplementTerrass($newSuppTerrasse);
								}
								$em->persist($newBien);
							}
							$em->flush($newBien);
						}
					}
				}
				$updateNombreChantier = count($chantier->getBiens());
				$chantier->setNombreBiens($updateNombreChantier);
				$em->persist($chantier);
				$em->flush($chantier);

				$this->addFlash(
					notif::INFO,
					'Les biens  ont bien été ajouter au chantier'
				);

				return new JsonResponse([
					'data' => 'Les biens on été ajoutés',
				]);
			}
		}
	}

}
