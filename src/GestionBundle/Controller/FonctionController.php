<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Fonction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Fonction controller.
 *
 * @Route("fonction")
 */
class FonctionController extends Controller
{
    /**
     * Lists all fonction entities.
     *
     * @Route("/", name="fonction_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fonctions = $em->getRepository('GestionBundle:Fonction')->findAll();

        return $this->render('fonction/index.html.twig', array(
            'fonctions' => $fonctions,
        ));
    }

    /**
     * Creates a new fonction entity.
     *
     * @Route("/new", name="fonction_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fonction = new Fonction();
        $form = $this->createForm('GestionBundle\Form\FonctionType', $fonction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fonction);
            $em->flush($fonction);

            return $this->redirectToRoute('fonction_index');
        }

        return $this->render('fonction/new.html.twig', array(
            'fonction' => $fonction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fonction entity.
     *
     * @Route("show/{id}", name="fonction_show")
     * @Method("GET")
     */
    public function showAction(Fonction $fonction)
    {
        $deleteForm = $this->createDeleteForm($fonction);

        return $this->render('fonction/show.html.twig', array(
            'fonction' => $fonction,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fonction entity.
     *
     * @Route("/{id}/edit", name="fonction_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fonction $fonction)
    {
        $deleteForm = $this->createDeleteForm($fonction);
        $editForm = $this->createForm('GestionBundle\Form\FonctionType', $fonction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fonction_index');
        }

        return $this->render('fonction/edit.html.twig', array(
            'fonction' => $fonction,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fonction entity.
     *
     * @Route("/{id}", name="fonction_delete")
     * @Method("GET")
     */
    public function deleteAction($id )
    {
        $em = $this->getDoctrine()->getManager();
            $fonction = $em->getRepository('GestionBundle:Fonction')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($fonction);
        $em->flush($fonction);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );

        return $this->redirectToRoute('fonction_index');
    }

    /**
     * Creates a form to delete a fonction entity.
     *
     * @param Fonction $fonction The fonction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fonction $fonction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fonction_delete', array('id' => $fonction->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
