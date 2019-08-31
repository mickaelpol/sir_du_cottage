<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ColorisParquet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Colorisparquet controller.
 *
 * @Route("colorisparquet")
 */
class ColorisParquetController extends Controller
{
    /**
     * Lists all colorisParquet entities.
     *
     * @Route("/", name="colorisparquet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $colorisParquets = $em->getRepository('AppBundle:ColorisParquet')->findAll();

        return $this->render('colorisparquet/index.html.twig', array(
            'colorisParquets' => $colorisParquets,
        ));
    }

    /**
     * Creates a new colorisParquet entity.
     *
     * @Route("/new", name="colorisparquet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $colorisParquet = new Colorisparquet();
        $form = $this->createForm('AppBundle\Form\ColorisParquetType', $colorisParquet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($colorisParquet);
            $em->flush();

            return $this->redirectToRoute('colorisparquet_show', array('id' => $colorisParquet->getId()));
        }

        return $this->render('colorisparquet/new.html.twig', array(
            'colorisParquet' => $colorisParquet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a colorisParquet entity.
     *
     * @Route("/{id}", name="colorisparquet_show")
     * @Method("GET")
     */
    public function showAction(ColorisParquet $colorisParquet)
    {
        $deleteForm = $this->createDeleteForm($colorisParquet);

        return $this->render('colorisparquet/show.html.twig', array(
            'colorisParquet' => $colorisParquet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing colorisParquet entity.
     *
     * @Route("/{id}/edit", name="colorisparquet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ColorisParquet $colorisParquet)
    {
        $deleteForm = $this->createDeleteForm($colorisParquet);
        $editForm = $this->createForm('AppBundle\Form\ColorisParquetType', $colorisParquet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('colorisparquet_edit', array('id' => $colorisParquet->getId()));
        }

        return $this->render('colorisparquet/edit.html.twig', array(
            'colorisParquet' => $colorisParquet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a colorisParquet entity.
     *
     * @Route("/{id}", name="colorisparquet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ColorisParquet $colorisParquet)
    {
        $form = $this->createDeleteForm($colorisParquet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($colorisParquet);
            $em->flush();
        }

        return $this->redirectToRoute('colorisparquet_index');
    }

    /**
     * Creates a form to delete a colorisParquet entity.
     *
     * @param ColorisParquet $colorisParquet The colorisParquet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ColorisParquet $colorisParquet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('colorisparquet_delete', array('id' => $colorisParquet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
