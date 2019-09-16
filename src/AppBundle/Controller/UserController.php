<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\EditUserPasswordType;
use AppBundle\Form\EditUserType;
use AppBundle\Form\UserEditType;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Constante\NotificationConstate as notif;

/**
 * Class UserController
 * @Route("user")
 * @package AppBundle\Controller
 */
class UserController extends Controller
{
    CONST CHEF = 'Chef d\'équipe';

    /**
     * Lists all users entities.
     * @Route(path="/", name="user_index", methods={"GET", "POST"})
     * @return Response
     * @Security("is_granted('ROLE_CHEF')")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $userActif = $this->getUser();
        $users = $em->getRepository(User::class)->getUserByRole($userActif);

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     * @Route(path="/new", name="user_new", methods={"GET", "POST"})
     * @param Request $request
     * @Security("is_granted('ROLE_CHEF')")
     * @return RedirectResponse|Response
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

            $this->addFlash(
                notif::SUCCESS,
                sprintf('L\'utilisateur %s à bien été créer !', $user)
            );

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
     * @Security("is_granted('ROLE_CHEF')")
     * @return RedirectResponse|Response
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

            $this->addFlash(
                notif::INFO,
                sprintf('Les changements concernant l\'utilisateur %s ont bien été pris en compte', $user)
            );

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', array(
            'user'      => $user,
            'edit_form' => $editForm->createView(),
        ));
    }


    /**
     * Displays a form to edit password an existing user entity.
     * @Route(path="/{id}/edit-password", name="user_password_edit", methods={"GET", "POST"})
     * @Security("is_granted('ROLE_CHEF')")
     * @param Request $request
     * @param User $user
     * @return RedirectResponse|Response
     */
    public function editPasswordAction(Request $request, User $user)
    {
        $form = $this->createForm(EditUserPasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userManager = $this->container->get('fos_user.user_manager');
            $userManager->updatePassword($user);
            $em->flush();

            $this->addFlash(
                notif::WARNING,
                sprintf('Le mot de passe de l\utilisateur %s à bien été modifé', $user)
            );

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit-password.html.twig', array(
            'user'      => $user,
            'edit_form' => $form->createView(),
        ));
    }


    /**
     * Deletes a user entity.
     * @Route(path="/{id}", name="user_delete", methods={"GET"})
     * @param Request $request
     * @param User $user
     * @Security("is_granted('ROLE_DIRECTEUR')")
     * @return RedirectResponse
     */
    public function deleteAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        $this->addFlash(
            notif::DANGER,
            sprintf('L\'utilisateur %s à bien été supprimé', $user)
        );

        return $this->redirectToRoute('user_index');
    }

    /**
     * @Route(path="/ajax/edit/{id}", name="user_edit_ajax", methods={"POST"})
     * @Security("has_role('ROLE_DIRECTEUR')",message="You have to be logged in")
     * @param Request $request
     */
    public function editEnabledAjax(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $tab = $request->get('donnees');
            $enabled = (int)$tab['enabled'] === 0 ? false : true;
            $phraseSuccess = $enabled === true ? 'activé' : 'désactiver';
            $tabUser = $tab['utilisateur'];
            $user = $em->getRepository(User::class)->find($tabUser);

            $user->setEnabled($enabled);
            $em->persist($user);
            $em->flush();

            echo json_encode([
                "label"   => "success",
                "success" => sprintf('L\'utilisateur %s à bien été %s', $user, $phraseSuccess),
            ]);
            header('Content-Type: application/json');
            http_response_code(200);
            die;
        }


    }

}
