<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Type_Qualification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Type_qualification controller.
 *
 * @Route("type_qualification")
 */
class Type_QualificationController extends Controller
{
    /**
     * Lists all type_Qualification entities.
     *
     * @Route("/", name="type_qualification_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $type_Qualifications = $em->getRepository('GestionBundle:Type_Qualification')->findAll();

        return $this->render('type_qualification/index.html.twig', array(
            'type_Qualifications' => $type_Qualifications,
        ));
    }

    /**
     * Creates a new type_Qualification entity.
     *
     * @Route("/new", name="type_qualification_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $type_Qualification = new Type_qualification();
        $form = $this->createForm('GestionBundle\Form\Type_QualificationType', $type_Qualification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type_Qualification);
            $em->flush($type_Qualification);

            return $this->redirectToRoute('type_qualification_index');
        }

        return $this->render('type_qualification/new.html.twig', array(
            'type_Qualification' => $type_Qualification,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type_Qualification entity.
     *
     * @Route("show/{id}", name="type_qualification_show")
     * @Method("GET")
     */
    public function showAction(Type_Qualification $type_Qualification)
    {
        $deleteForm = $this->createDeleteForm($type_Qualification);

        return $this->render('type_qualification/show.html.twig', array(
            'type_Qualification' => $type_Qualification,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type_Qualification entity.
     *
     * @Route("/{id}/edit", name="type_qualification_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Type_Qualification $type_Qualification)
    {
        $deleteForm = $this->createDeleteForm($type_Qualification);
        $editForm = $this->createForm('GestionBundle\Form\Type_QualificationType', $type_Qualification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_qualification_index');
        }

        return $this->render('type_qualification/edit.html.twig', array(
            'type_Qualification' => $type_Qualification,
            'edit_form' => $editForm->createView(),
           'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type_Qualification entity.
     *
     * @Route("/{id}", name="type_qualification_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $typequalification = $em->getRepository('GestionBundle:Type_Qualification')->find($id);

        $em->remove($typequalification);
        $em->flush($typequalification);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('type_qualification_index');
    }

    /**
     * Creates a form to delete a type_Qualification entity.
     *
     * @param Type_Qualification $type_Qualification The type_Qualification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Type_Qualification $type_Qualification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_qualification_delete', array('id' => $type_Qualification->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
