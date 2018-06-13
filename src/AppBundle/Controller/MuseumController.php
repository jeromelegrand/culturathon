<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Museum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Museum controller.
 *
 * @Route("museum")
 */
class MuseumController extends Controller
{
    /**
     * Lists all museum entities.
     *
     * @Route("/", name="museum_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $museums = $em->getRepository('AppBundle:Museum')->findAll();

        return $this->render('museum/index.html.twig', array(
            'museums' => $museums,
        ));
    }

    /**
     * Creates a new museum entity.
     *
     * @Route("/new", name="museum_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $museum = new Museum();
        $form = $this->createForm('AppBundle\Form\MuseumType', $museum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($museum);
            $em->flush();

            return $this->redirectToRoute('museum_show', array('id' => $museum->getId()));
        }

        return $this->render('museum/new.html.twig', array(
            'museum' => $museum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a museum entity.
     *
     * @Route("/{id}", name="museum_show")
     * @Method("GET")
     */
    public function showAction(Museum $museum)
    {
        $deleteForm = $this->createDeleteForm($museum);

        return $this->render('museum/show.html.twig', array(
            'museum' => $museum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing museum entity.
     *
     * @Route("/{id}/edit", name="museum_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Museum $museum)
    {
        $deleteForm = $this->createDeleteForm($museum);
        $editForm = $this->createForm('AppBundle\Form\MuseumType', $museum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('museum_edit', array('id' => $museum->getId()));
        }

        return $this->render('museum/edit.html.twig', array(
            'museum' => $museum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a museum entity.
     *
     * @Route("/{id}", name="museum_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Museum $museum)
    {
        $form = $this->createDeleteForm($museum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($museum);
            $em->flush();
        }

        return $this->redirectToRoute('museum_index');
    }

    /**
     * Creates a form to delete a museum entity.
     *
     * @param Museum $museum The museum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Museum $museum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('museum_delete', array('id' => $museum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
