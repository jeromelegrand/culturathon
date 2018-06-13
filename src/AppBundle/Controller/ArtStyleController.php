<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ArtStyle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Artstyle controller.
 *
 * @Route("artstyle")
 */
class ArtStyleController extends Controller
{
    /**
     * Lists all artStyle entities.
     *
     * @Route("/", name="artstyle_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $artStyles = $em->getRepository('AppBundle:ArtStyle')->findAll();

        return $this->render('artstyle/index.html.twig', array(
            'artStyles' => $artStyles,
        ));
    }

    /**
     * Creates a new artStyle entity.
     *
     * @Route("/new", name="artstyle_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $artStyle = new Artstyle();
        $form = $this->createForm('AppBundle\Form\ArtStyleType', $artStyle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($artStyle);
            $em->flush();

            return $this->redirectToRoute('artstyle_show', array('id' => $artStyle->getId()));
        }

        return $this->render('artstyle/new.html.twig', array(
            'artStyle' => $artStyle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a artStyle entity.
     *
     * @Route("/{id}", name="artstyle_show")
     * @Method("GET")
     */
    public function showAction(ArtStyle $artStyle)
    {
        $deleteForm = $this->createDeleteForm($artStyle);

        return $this->render('artstyle/show.html.twig', array(
            'artStyle' => $artStyle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing artStyle entity.
     *
     * @Route("/{id}/edit", name="artstyle_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ArtStyle $artStyle)
    {
        $deleteForm = $this->createDeleteForm($artStyle);
        $editForm = $this->createForm('AppBundle\Form\ArtStyleType', $artStyle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('artstyle_edit', array('id' => $artStyle->getId()));
        }

        return $this->render('artstyle/edit.html.twig', array(
            'artStyle' => $artStyle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a artStyle entity.
     *
     * @Route("/{id}", name="artstyle_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ArtStyle $artStyle)
    {
        $form = $this->createDeleteForm($artStyle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($artStyle);
            $em->flush();
        }

        return $this->redirectToRoute('artstyle_index');
    }

    /**
     * Creates a form to delete a artStyle entity.
     *
     * @param ArtStyle $artStyle The artStyle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ArtStyle $artStyle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('artstyle_delete', array('id' => $artStyle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
