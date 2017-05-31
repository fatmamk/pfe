<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\FormationComplementaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Formationcomplementaire controller.
 *
 * @Route("formationcomplementaire")
 */
class FormationComplementaireController extends Controller
{
    /**
     * Lists all formationComplementaire entities.
     *
     * @Route("/", name="formationcomplementaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formationComplementaires = $em->getRepository('GestionBundle:FormationComplementaire')->findAll();

        return $this->render('formationcomplementaire/index.html.twig', array(
            'formationComplementaires' => $formationComplementaires,
        ));
    }

    /**
     * Creates a new formationComplementaire entity.
     *
     * @Route("/new", name="formationcomplementaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $formationComplementaire = new Formationcomplementaire();
        $form = $this->createForm('GestionBundle\Form\FormationComplementaireType', $formationComplementaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($formationComplementaire);
            $em->flush($formationComplementaire);

            return $this->redirectToRoute('formationcomplementaire_index');
        }

        return $this->render('formationcomplementaire/new.html.twig', array(
            'formationComplementaire' => $formationComplementaire,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a formationComplementaire entity.
     *
     * @Route("show/{id}", name="formationcomplementaire_show")
     * @Method("GET")
     */
    public function showAction(FormationComplementaire $formationComplementaire)
    {
        $deleteForm = $this->createDeleteForm($formationComplementaire);

        return $this->render('formationcomplementaire/show.html.twig', array(
            'formationComplementaire' => $formationComplementaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formationComplementaire entity.
     *
     * @Route("/{id}/edit", name="formationcomplementaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FormationComplementaire $formationComplementaire)
    {
        $deleteForm = $this->createDeleteForm($formationComplementaire);
        $editForm = $this->createForm('GestionBundle\Form\FormationComplementaireType', $formationComplementaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'succes',
                ", formation complémentaire a été modifié!"
            );
            return $this->redirectToRoute('formationcomplementaire_index');
        }

        return $this->render('formationcomplementaire/edit.html.twig', array(
            'formationComplementaire' => $formationComplementaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formationComplementaire entity.
     *
     * @Route("/{id}", name="formationcomplementaire_delete")
     * @Method("Get")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $formationcomp = $em->getRepository('GestionBundle:FormationComplementaire')->find($id);

        $em->remove($formationcomp);
        $em->flush($formationcomp);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('formationcomplementaire_index');
    }




    /**
     * Creates a form to delete a formationComplementaire entity.
     *
     * @param FormationComplementaire $formationComplementaire The formationComplementaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FormationComplementaire $formationComplementaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formationcomplementaire_delete', array('id' => $formationComplementaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
