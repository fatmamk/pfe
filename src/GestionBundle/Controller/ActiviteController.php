<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Activite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Activite controller.
 *
 * @Route("activite")
 */
class ActiviteController extends Controller
{
    /**
     * Lists all activite entities.
     *
     * @Route("/", name="activite_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activites = $em->getRepository('GestionBundle:Activite')->findAll();

        return $this->render('activite/index.html.twig', array(
            'activites' => $activites,
        ));
    }

    /**
     * Creates a new activite entity.
     *
     * @Route("/new", name="activite_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $activite = new Activite();
        $form = $this->createForm('GestionBundle\Form\ActiviteType', $activite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush($activite);

            return $this->redirectToRoute('activite_index');
        }

        return $this->render('activite/new.html.twig', array(
            'activite' => $activite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activite entity.
     *
     * @Route("show/{id}", name="activite_show")
     * @Method("GET")
     */
    public function showAction(Activite $activite)
    {
        $deleteForm = $this->createDeleteForm($activite);

        return $this->render('activite/show.html.twig', array(
            'activite' => $activite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activite entity.
     *
     * @Route("/{id}/edit", name="activite_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Activite $activite)
    {
        $deleteForm = $this->createDeleteForm($activite);
        $editForm = $this->createForm('GestionBundle\Form\ActiviteType', $activite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('activite_index');
        }

        return $this->render('activite/edit.html.twig', array(
            'activite' => $activite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activite entity.
     *
     * @Route("/{id}", name="activite_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('GestionBundle:Activite')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($activite);
        $em->flush($activite);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );

        return $this->redirectToRoute('activite_index');
    }


    /**
     * Creates a form to delete a activite entity.
     *
     * @param Activite $activite The activite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activite $activite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('activite_delete', array('id' => $activite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
