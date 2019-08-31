<?php

namespace AppBundle\Controller;

use AppBundle\Entity\SupplementParquet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Supplementparquet controller.
 *
 * @Route("supplementparquet")
 */
class SupplementParquetController extends Controller
{
    /**
     * Lists all supplementParquet entities.
     *
     * @Route("/", name="supplementparquet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $supplementParquets = $em->getRepository('AppBundle:SupplementParquet')->findAll();

        return $this->render('supplementparquet/index.html.twig', array(
            'supplementParquets' => $supplementParquets,
        ));
    }

    /**
     * Creates a new supplementParquet entity.
     *
     * @Route("/new", name="supplementparquet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $supplementParquet = new Supplementparquet();
        $form = $this->createForm('AppBundle\Form\SupplementParquetType', $supplementParquet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplementParquet);
            $em->flush();

            return $this->redirectToRoute('supplementparquet_show', array('id' => $supplementParquet->getId()));
        }

        return $this->render('supplementparquet/new.html.twig', array(
            'supplementParquet' => $supplementParquet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a supplementParquet entity.
     *
     * @Route("/{id}", name="supplementparquet_show")
     * @Method("GET")
     */
    public function showAction(SupplementParquet $supplementParquet)
    {
        $deleteForm = $this->createDeleteForm($supplementParquet);

        return $this->render('supplementparquet/show.html.twig', array(
            'supplementParquet' => $supplementParquet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing supplementParquet entity.
     *
     * @Route("/{id}/edit", name="supplementparquet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SupplementParquet $supplementParquet)
    {
        $deleteForm = $this->createDeleteForm($supplementParquet);
        $editForm = $this->createForm('AppBundle\Form\SupplementParquetType', $supplementParquet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('supplementparquet_edit', array('id' => $supplementParquet->getId()));
        }

        return $this->render('supplementparquet/edit.html.twig', array(
            'supplementParquet' => $supplementParquet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a supplementParquet entity.
     *
     * @Route("/{id}", name="supplementparquet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SupplementParquet $supplementParquet)
    {
        $form = $this->createDeleteForm($supplementParquet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($supplementParquet);
            $em->flush();
        }

        return $this->redirectToRoute('supplementparquet_index');
    }

    /**
     * Creates a form to delete a supplementParquet entity.
     *
     * @param SupplementParquet $supplementParquet The supplementParquet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SupplementParquet $supplementParquet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('supplementparquet_delete', array('id' => $supplementParquet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
