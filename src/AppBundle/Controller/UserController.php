<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @Route("user")
 * @package AppBundle\Controller
 */
class UserController extends Controller
{

	/**
	 * Lists all users entities.
	 * @Route(path="/", name="user_index", methods={"GET"})
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();

		$users = $em->getRepository(User::class)->findAll();
		return $this->render('user/index.html.twig', array(
			'users' => $users,
		));
	}

	/**
	 * Creates a new user entity.
	 * @Route(path="/new", name="user_new", methods={"GET", "POST"})
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function newAction(Request $request)
	{
		$user = new User();
		$form = $this->createForm(UserType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$user->setEnabled(true);
			$em->persist($user);
			$em->flush();

			/*, array('id' => $bien->getId())*/
			return $this->redirectToRoute('user_index');
		}

		return $this->render('user/new.html.twig', array(
			'user' => $user,
			'form' => $form->createView(),
		));
	}

	/**
	 * Deletes a user entity.
	 * @Route(path="/{id}", name="user_delete", methods={"GET"})
	 * @param Request $request
	 * @param User $user
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function deleteAction(Request $request, User $user)
	{
			$em = $this->getDoctrine()->getManager();
			$em->remove($user);
			$em->flush();

		return $this->redirectToRoute('user_index');
	}

}
