<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
	/**
	 * Lists all chantier entities.
	 * @Route(path="/", name="accueil", methods={"GET"})
	 * @Security("is_granted('ROLE_CHEF')")
	 */
	public function backOfficeAction()
	{
		$em = $this->getDoctrine()->getManager();
		$nombreChantiers = $em->getRepository(Chantier::class)->countChantier();
		$nombreBiens = $em->getRepository(Bien::class)->countBien();


		return $this->render('recapitulatif/recapitulatif.html.twig', array(
			'nombreChantiers' => $nombreChantiers,
			'nombreBiens' => $nombreBiens,
		));
	}
}
