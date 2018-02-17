<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DictType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Dicttype controller.
 *
 * @Route("dicttype")
 */
class DictTypeController extends Controller
{
    /**
     * Lists all dictType entities.
     *
     * @Route("/", name="dicttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dictTypes = $em->getRepository('AppBundle:DictType')->findAll();

        return $this->render('dicttype/index.html.twig', array(
            'dictTypes' => $dictTypes,
        ));
    }

    /**
     * Creates a new dictType entity.
     *
     * @Route("/new", name="dicttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $dictType = new Dicttype();
        $form = $this->createForm('AppBundle\Form\DictTypeType', $dictType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dictType);
            $em->flush();

            return $this->redirectToRoute('dicttype_show', array('id' => $dictType->getId()));
        }

        return $this->render('dicttype/new.html.twig', array(
            'dictType' => $dictType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dictType entity.
     *
     * @Route("/{id}", name="dicttype_show")
     * @Method("GET")
     */
    public function showAction(DictType $dictType)
    {
        $deleteForm = $this->createDeleteForm($dictType);

        return $this->render('dicttype/show.html.twig', array(
            'dictType' => $dictType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dictType entity.
     *
     * @Route("/{id}/edit", name="dicttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DictType $dictType)
    {
        $deleteForm = $this->createDeleteForm($dictType);
        $editForm = $this->createForm('AppBundle\Form\DictTypeType', $dictType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dicttype_edit', array('id' => $dictType->getId()));
        }

        return $this->render('dicttype/edit.html.twig', array(
            'dictType' => $dictType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a dictType entity.
     *
     * @Route("/{id}", name="dicttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DictType $dictType)
    {
        $form = $this->createDeleteForm($dictType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($dictType);
            $em->flush();
        }

        return $this->redirectToRoute('dicttype_index');
    }

    /**
     * Creates a form to delete a dictType entity.
     *
     * @param DictType $dictType The dictType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DictType $dictType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dicttype_delete', array('id' => $dictType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
