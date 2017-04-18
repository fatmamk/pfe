<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Carriere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Carriere controller.
 *
 * @Route("carriere")
 */
class CarriereController extends Controller
{
    /**
     * Lists all carriere entities.
     *
     * @Route("/", name="carriere_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carrieres = $em->getRepository('GestionBundle:Carriere')->findAll();

        return $this->render('carriere/index.html.twig', array(
            'carrieres' => $carrieres,
        ));
    }

    /**
     * Creates a new carriere entity.
     *
     * @Route("/new", name="carriere_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carriere = new Carriere();
        $form = $this->createForm('GestionBundle\Form\CarriereType', $carriere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carriere);
            $em->flush($carriere);

            return $this->redirectToRoute('carriere_index');
        }

        return $this->render('carriere/new.html.twig', array(
            'carriere' => $carriere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carriere entity.
     *
     * @Route("show/{id}", name="carriere_show")
     * @Method("GET")
     */
    public function showAction(Carriere $carriere)
    {
        $deleteForm = $this->createDeleteForm($carriere);

        return $this->render('carriere/show.html.twig', array(
            'carriere' => $carriere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing carriere entity.
     *
     * @Route("/{id}/edit", name="carriere_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Carriere $carriere)
    {
        $deleteForm = $this->createDeleteForm($carriere);
        $editForm = $this->createForm('GestionBundle\Form\CarriereType', $carriere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carriere_index');
        }

        return $this->render('carriere/edit.html.twig', array(
            'carriere' => $carriere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a carriere entity.
     *
     * @Route("/{id}", name="carriere_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $carriere = $em->getRepository('GestionBundle:Carriere')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($carriere);
        $em->flush($carriere);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );


        return $this->redirectToRoute('carriere_index');
    }

    /**
     * Creates a form to delete a carriere entity.
     *
     * @param Carriere $carriere The carriere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carriere $carriere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carriere_delete', array('id' => $carriere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
