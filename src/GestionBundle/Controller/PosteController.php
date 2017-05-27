<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Poste;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Poste controller.
 *
 * @Route("poste")
 */
class PosteController extends Controller
{
    /**
     * Lists all poste entities.
     *
     * @Route("/", name="poste_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $postes = $em->getRepository('GestionBundle:Poste')->findAll();

        return $this->render('poste/index.html.twig', array(
            'postes' => $postes,
        ));
    }

    /**
     * Creates a new poste entity.
     *
     * @Route("/new", name="poste_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $poste = new Poste();
        $form = $this->createForm('GestionBundle\Form\PosteType', $poste);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($poste);
            $em->flush($poste);

            return $this->redirectToRoute('poste_index');
        }

        return $this->render('poste/new.html.twig', array(
            'poste' => $poste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a poste entity.
     *
     * @Route("show/{id}", name="poste_show")
     * @Method("GET")
     */
    public function showAction(Poste $poste)
    {
        $deleteForm = $this->createDeleteForm($poste);

        return $this->render('poste/show.html.twig', array(
            'poste' => $poste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing poste entity.
     *
     * @Route("/{id}/edit", name="poste_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Poste $poste)
    {
        $deleteForm = $this->createDeleteForm($poste);
        $editForm = $this->createForm('GestionBundle\Form\PosteType', $poste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('poste_index');
        }

        return $this->render('poste/edit.html.twig', array(
            'poste' => $poste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a poste entity.
     *
     * @Route("/{id}", name="poste_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $poste = $em->getRepository('GestionBundle:Poste')->find($id);


        $em = $this->getDoctrine()->getManager();
        $em->remove($poste);
        $em->flush($poste);
        $this->addFlash(
            'deletesuccess',
            ', poste a été supprimé!'
        );
        return $this->redirectToRoute('poste_index');
    }

    /**
     * Creates a form to delete a poste entity.
     *
     * @param Poste $poste The poste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Poste $poste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('poste_delete', array('id' => $poste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
