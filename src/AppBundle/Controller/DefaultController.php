<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
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
}
