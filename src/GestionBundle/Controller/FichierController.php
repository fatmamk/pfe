<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Fichier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fichier controller.
 *
 * @Route("fichier")
 */
class FichierController extends Controller
{
    /**
     * Lists all fichier entities.
     *
     * @Route("/", name="fichier_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fichiers = $em->getRepository('GestionBundle:Fichier')->findAll();

        return $this->render('fichier/index.html.twig', array(
            'fichiers' => $fichiers,
        ));
    }

    /**
     * Creates a new fichier entity.
     *
     * @Route("/new", name="fichier_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fichier = new Fichier();
        $form = $this->createForm('GestionBundle\Form\FichierType', $fichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fichier->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($fichier);
            $em->flush($fichier);

            return $this->redirectToRoute('fichier_index');
        }

        return $this->render('fichier/new.html.twig', array(
            'fichier' => $fichier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fichier entity.
     *
     * @Route("show/{id}", name="fichier_show")
     * @Method("GET")
     */
    public function showAction(Fichier $fichier)
    {
        $deleteForm = $this->createDeleteForm($fichier);

        return $this->render('fichier/show.html.twig', array(
            'fichier' => $fichier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fichier entity.
     *
     * @Route("/{id}/edit", name="fichier_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Fichier $fichier)
    {
        $deleteForm = $this->createDeleteForm($fichier);
        $editForm = $this->createForm('GestionBundle\Form\FichierType', $fichier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichier_index');
        }

        return $this->render('fichier/edit.html.twig', array(
            'fichier' => $fichier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fichier entity.
     *
     * @Route("/{id}", name="fichier_delete")
     * @Method("Get")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $fichier = $em->getRepository('GestionBundle:Fichier')->find($id);

        $em->remove($fichier);
        $em->flush($fichier);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('fichier_index');
    }

    /**
     * Creates a form to delete a fichier entity.
     *
     * @param Fichier $fichier The fichier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fichier $fichier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fichier_delete', array('id' => $fichier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
