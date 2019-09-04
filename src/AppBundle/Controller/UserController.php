<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\EditUserType;
use AppBundle\Form\UserEditType;
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
	 * @Route(path="/", name="user_index", methods={"GET", "POST"})
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		$users = $em->getRepository(User::class)->findAll();

		return $this->render('user/index.html.twig', array(
			'users'     => $users,
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
	 * Displays a form to edit an existing user entity.
	 * @Route(path="/{id}/edit", name="user_edit", methods={"GET", "POST"})
	 * @param Request $request
	 * @param User $user
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	public function editAction(Request $request, User $user)
	{
		$editForm = $this->createForm(EditUserType::class, $user);
		$editForm->handleRequest($request);

		if ($editForm->isSubmitted() && $editForm->isValid()) {
			$newRole = [$request->request->get('appbundle_user')['role']];
			$user->removeRole($user->getFirstRole($user));
			$user->setRoles($newRole);
			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('user_edit', array('id' => $user->getId()));
		}

		return $this->render('user/edit.html.twig', array(
			'user' => $user,
			'edit_form' => $editForm->createView(),
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
