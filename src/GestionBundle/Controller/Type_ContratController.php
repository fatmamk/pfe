<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Type_Contrat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Type_contrat controller.
 *
 * @Route("type_contrat")
 */
class Type_ContratController extends Controller
{
    /**
     * Lists all type_Contrat entities.
     *
     * @Route("/", name="type_contrat_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $type_Contrats = $em->getRepository('GestionBundle:Type_Contrat')->findAll();

        return $this->render('type_contrat/index.html.twig', array(
            'type_Contrats' => $type_Contrats,
        ));
    }

    /**
     * Creates a new type_Contrat entity.
     *
     * @Route("/new", name="type_contrat_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $type_Contrat = new Type_contrat();
        $form = $this->createForm('GestionBundle\Form\Type_ContratType', $type_Contrat);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type_Contrat);
            $em->flush($type_Contrat);

            return $this->redirectToRoute('type_contrat_index');
        }

        return $this->render('type_contrat/new.html.twig', array(
            'type_Contrat' => $type_Contrat,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type_Contrat entity.
     *
     * @Route("show/{id}", name="type_contrat_show")
     * @Method("GET")
     */
    public function showAction(Type_Contrat $type_Contrat)
    {
        $deleteForm = $this->createDeleteForm($type_Contrat);

        return $this->render('type_contrat/show.html.twig', array(
            'type_Contrat' => $type_Contrat,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type_Contrat entity.
     *
     * @Route("/{id}/edit", name="type_contrat_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Type_Contrat $type_Contrat)
    {
        $deleteForm = $this->createDeleteForm($type_Contrat);
        $editForm = $this->createForm('GestionBundle\Form\Type_ContratType', $type_Contrat);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_contrat_index');
        }

        return $this->render('type_contrat/edit.html.twig', array(
            'type_Contrat' => $type_Contrat,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type_Contrat entity.
     *
     * @Route("/{id}", name="type_contrat_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $typec = $em->getRepository('GestionBundle:Type_Contrat')->find($id);

        $em->remove($typec);
        $em->flush($typec);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );

        return $this->redirectToRoute('type_contrat_index');
    }

    /**
     * Creates a form to delete a type_Contrat entity.
     *
     * @param Type_Contrat $type_Contrat The type_Contrat entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Type_Contrat $type_Contrat)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_contrat_delete', array('id' => $type_Contrat->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
