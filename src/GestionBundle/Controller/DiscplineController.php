<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Discpline;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Discpline controller.
 *
 * @Route("discpline")
 */
class DiscplineController extends Controller
{
    /**
     * Lists all discpline entities.
     *
     * @Route("/", name="discpline_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $discplines = $em->getRepository('GestionBundle:Discpline')->findAll();

        return $this->render('discpline/index.html.twig', array(
            'discplines' => $discplines,
        ));
    }

    /**
     * Creates a new discpline entity.
     *
     * @Route("/new", name="discpline_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $discpline = new Discpline();
        $form = $this->createForm('GestionBundle\Form\DiscplineType', $discpline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discpline);
            $em->flush($discpline);

            return $this->redirectToRoute('discpline_show', array('id' => $discpline->getId()));
        }

        return $this->render('discpline/new.html.twig', array(
            'discpline' => $discpline,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a discpline entity.
     *
     * @Route("/{id}", name="discpline_show")
     * @Method("GET")
     */
    public function showAction(Discpline $discpline)
    {
        $deleteForm = $this->createDeleteForm($discpline);

        return $this->render('discpline/show.html.twig', array(
            'discpline' => $discpline,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing discpline entity.
     *
     * @Route("/{id}/edit", name="discpline_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Discpline $discpline)
    {
        $deleteForm = $this->createDeleteForm($discpline);
        $editForm = $this->createForm('GestionBundle\Form\DiscplineType', $discpline);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('discpline_edit', array('id' => $discpline->getId()));
        }

        return $this->render('discpline/edit.html.twig', array(
            'discpline' => $discpline,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a discpline entity.
     *
     * @Route("/{id}", name="discpline_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Discpline $discpline)
    {
        $form = $this->createDeleteForm($discpline);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($discpline);
            $em->flush($discpline);
        }

        return $this->redirectToRoute('discpline_index');
    }

    /**
     * Creates a form to delete a discpline entity.
     *
     * @param Discpline $discpline The discpline entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Discpline $discpline)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discpline_delete', array('id' => $discpline->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
