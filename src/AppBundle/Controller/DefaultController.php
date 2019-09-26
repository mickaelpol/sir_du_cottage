<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Bien;
use AppBundle\Entity\Chantier;
use AppBundle\Entity\CommentaireChantier;
use AppBundle\Entity\User;
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
		$nombreChantiers = $em->getRepository(Chantier::class)->nombreChantiers();
		$nombreBiens = $em->getRepository(Bien::class)->nombreBiens();
		$cinqDernierComChantiers = $em->getRepository(CommentaireChantier::class)->findBy([], [
			'id' => 'DESC',
		], 5);
		$nombreDutilisateurs = $em->getRepository(User::class)->nombreDutilisateur();
		$chantierAvancer = $em->getRepository(Chantier::class)->quattreChantierPlusAvancer();


		return $this->render('recapitulatif/recapitulatif.html.twig', array(
			'nombreChantiers'        => $nombreChantiers,
			'nombreBiens'            => $nombreBiens,
			'cinqDernierComChantier' => $cinqDernierComChantiers,
			'nombreDutilisateurs'    => $nombreDutilisateurs,
			'chantiers'               => $chantierAvancer,
		));
	}
}
