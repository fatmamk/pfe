<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Conge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Conge controller.
 *
 * @Route("conge")
 */
class CongeController extends Controller
{
    /**
     * Lists all conge entities.
     *
     * @Route("/", name="conge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $conges = $em->getRepository('GestionBundle:Conge')->findAll();

        return $this->render('conge/index.html.twig', array(
            'conges' => $conges,
        ));
    }

    /**
     * Creates a new conge entity.
     *
     * @Route("/new", name="conge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $conge = new Conge();
        $form = $this->createForm('GestionBundle\Form\CongeType', $conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush($conge);

            return $this->redirectToRoute('conge_index');
        }

        return $this->render('conge/new.html.twig', array(
            'conge' => $conge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a conge entity.
     *
     * @Route("show/{id}", name="conge_show")
     * @Method("GET")
     */
    public function showAction(Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);

        return $this->render('conge/show.html.twig', array(
            'conge' => $conge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing conge entity.
     *
     * @Route("/{id}/edit", name="conge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Conge $conge)
    {
        $deleteForm = $this->createDeleteForm($conge);
        $editForm = $this->createForm('GestionBundle\Form\CongeType', $conge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conge_index');
        }

        return $this->render('conge/edit.html.twig', array(
            'conge' => $conge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a conge entity.
     *
     * @Route("/{id}", name="conge_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $conge = $em->getRepository('GestionBundle:Conge')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($conge);
        $em->flush($conge);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );


        return $this->redirectToRoute('conge_index');
    }

    /**
     * Creates a form to delete a conge entity.
     *
     * @param Conge $conge The conge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Conge $conge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('conge_delete', array('id' => $conge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
