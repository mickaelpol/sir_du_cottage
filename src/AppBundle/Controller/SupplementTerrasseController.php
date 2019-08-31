<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SupplementTerrasse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Supplementterrasse controller.
 *
 * @Route("supplementterrasse")
 */
class SupplementTerrasseController extends Controller
{
    /**
     * Lists all supplementTerrasse entities.
     *
     * @Route("/", name="supplementterrasse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $supplementTerrasses = $em->getRepository('AppBundle:SupplementTerrasse')->findAll();

        return $this->render('supplementterrasse/index.html.twig', array(
            'supplementTerrasses' => $supplementTerrasses,
        ));
    }

    /**
     * Creates a new supplementTerrasse entity.
     *
     * @Route("/new", name="supplementterrasse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $supplementTerrasse = new Supplementterrasse();
        $form = $this->createForm('AppBundle\Form\SupplementTerrasseType', $supplementTerrasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplementTerrasse);
            $em->flush();

            return $this->redirectToRoute('supplementterrasse_show', array('id' => $supplementTerrasse->getId()));
        }

        return $this->render('supplementterrasse/new.html.twig', array(
            'supplementTerrasse' => $supplementTerrasse,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a supplementTerrasse entity.
     *
     * @Route("/{id}", name="supplementterrasse_show")
     * @Method("GET")
     */
    public function showAction(SupplementTerrasse $supplementTerrasse)
    {
        $deleteForm = $this->createDeleteForm($supplementTerrasse);

        return $this->render('supplementterrasse/show.html.twig', array(
            'supplementTerrasse' => $supplementTerrasse,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing supplementTerrasse entity.
     *
     * @Route("/{id}/edit", name="supplementterrasse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SupplementTerrasse $supplementTerrasse)
    {
        $deleteForm = $this->createDeleteForm($supplementTerrasse);
        $editForm = $this->createForm('AppBundle\Form\SupplementTerrasseType', $supplementTerrasse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('supplementterrasse_edit', array('id' => $supplementTerrasse->getId()));
        }

        return $this->render('supplementterrasse/edit.html.twig', array(
            'supplementTerrasse' => $supplementTerrasse,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a supplementTerrasse entity.
     *
     * @Route("/{id}", name="supplementterrasse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SupplementTerrasse $supplementTerrasse)
    {
        $form = $this->createDeleteForm($supplementTerrasse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($supplementTerrasse);
            $em->flush();
        }

        return $this->redirectToRoute('supplementterrasse_index');
    }

    /**
     * Creates a form to delete a supplementTerrasse entity.
     *
     * @param SupplementTerrasse $supplementTerrasse The supplementTerrasse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SupplementTerrasse $supplementTerrasse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supplementterrasse_delete', array('id' => $supplementTerrasse->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
