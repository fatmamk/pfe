<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\NatureAbsence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Natureabsence controller.
 *
 * @Route("natureabsence")
 */
class NatureAbsenceController extends Controller
{
    /**
     * Lists all natureAbsence entities.
     *
     * @Route("/", name="natureabsence_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $natureAbsences = $em->getRepository('GestionBundle:NatureAbsence')->findAll();

        return $this->render('natureabsence/index.html.twig', array(
            'natureAbsences' => $natureAbsences,
        ));
    }

    /**
     * Creates a new natureAbsence entity.
     *
     * @Route("/new", name="natureabsence_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $natureAbsence = new Natureabsence();
        $form = $this->createForm('GestionBundle\Form\NatureAbsenceType', $natureAbsence);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($natureAbsence);
            $em->flush($natureAbsence);

            return $this->redirectToRoute('natureabsence_index');
        }

        return $this->render('natureabsence/new.html.twig', array(
            'natureAbsence' => $natureAbsence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a natureAbsence entity.
     *
     * @Route("show/{id}", name="natureabsence_show")
     * @Method("GET")
     */
    public function showAction(NatureAbsence $natureAbsence)
    {
        $deleteForm = $this->createDeleteForm($natureAbsence);

        return $this->render('natureabsence/show.html.twig', array(
            'natureAbsence' => $natureAbsence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing natureAbsence entity.
     *
     * @Route("/{id}/edit", name="natureabsence_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NatureAbsence $natureAbsence)
    {
        $deleteForm = $this->createDeleteForm($natureAbsence);
        $editForm = $this->createForm('GestionBundle\Form\NatureAbsenceType', $natureAbsence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('natureabsence_index');
        }

        return $this->render('natureabsence/edit.html.twig', array(
            'natureAbsence' => $natureAbsence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a natureAbsence entity.
     *
     * @Route("/{id}", name="natureabsence_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $natureconge = $em->getRepository('GestionBundle:NatureAbsence')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($natureconge);
        $em->flush($natureconge);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );



        return $this->redirectToRoute('natureabsence_index');
    }

    /**
     * Creates a form to delete a natureAbsence entity.
     *
     * @param NatureAbsence $natureAbsence The natureAbsence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NatureAbsence $natureAbsence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('natureabsence_delete', array('id' => $natureAbsence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
