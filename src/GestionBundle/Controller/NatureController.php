<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Nature;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Nature controller.
 *
 * @Route("nature")
 */
class NatureController extends Controller
{
    /**
     * Lists all nature entities.
     *
     * @Route("/", name="nature_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $natures = $em->getRepository('GestionBundle:Nature')->findAll();

        return $this->render('nature/index.html.twig', array(
            'natures' => $natures,
        ));
    }

    /**
     * Creates a new nature entity.
     *
     * @Route("/new", name="nature_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $nature = new Nature();
        $form = $this->createForm('GestionBundle\Form\NatureType', $nature);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($nature);
            $em->flush($nature);

            return $this->redirectToRoute('nature_show', array('id' => $nature->getId()));
        }

        return $this->render('nature/new.html.twig', array(
            'nature' => $nature,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a nature entity.
     *
     * @Route("/{id}", name="nature_show")
     * @Method("GET")
     */
    public function showAction(Nature $nature)
    {
        $deleteForm = $this->createDeleteForm($nature);

        return $this->render('nature/show.html.twig', array(
            'nature' => $nature,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing nature entity.
     *
     * @Route("/{id}/edit", name="nature_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Nature $nature)
    {
        $deleteForm = $this->createDeleteForm($nature);
        $editForm = $this->createForm('GestionBundle\Form\NatureType', $nature);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nature_edit', array('id' => $nature->getId()));
        }

        return $this->render('nature/edit.html.twig', array(
            'nature' => $nature,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a nature entity.
     *
     * @Route("/{id}", name="nature_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Nature $nature)
    {
        $form = $this->createDeleteForm($nature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($nature);
            $em->flush($nature);
        }

        return $this->redirectToRoute('nature_index');
    }

    /**
     * Creates a form to delete a nature entity.
     *
     * @param Nature $nature The nature entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Nature $nature)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nature_delete', array('id' => $nature->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
