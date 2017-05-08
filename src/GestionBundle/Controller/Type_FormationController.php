<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Type_Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Type_formation controller.
 *
 * @Route("type_formation")
 */
class Type_FormationController extends Controller
{
    /**
     * Lists all type_Formation entities.
     *
     * @Route("/", name="type_formation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $type_Formations = $em->getRepository('GestionBundle:Type_Formation')->findAll();

        return $this->render('type_formation/index.html.twig', array(
            'type_Formations' => $type_Formations,
        ));
    }

    /**
     * Creates a new type_Formation entity.
     *
     * @Route("/new", name="type_formation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $type_Formation = new Type_formation();
        $form = $this->createForm('GestionBundle\Form\Type_FormationType', $type_Formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type_Formation);
            $em->flush($type_Formation);

            return $this->redirectToRoute('type_formation_index');
        }

        return $this->render('type_formation/new.html.twig', array(
            'type_Formation' => $type_Formation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type_Formation entity.
     *
     * @Route("show/{id}", name="type_formation_show")
     * @Method("GET")
     */
    public function showAction(Type_Formation $type_Formation)
    {
        $deleteForm = $this->createDeleteForm($type_Formation);

        return $this->render('type_formation/show.html.twig', array(
            'type_Formation' => $type_Formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type_Formation entity.
     *
     * @Route("/{id}/edit", name="type_formation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Type_Formation $type_Formation)
    {
        $deleteForm = $this->createDeleteForm($type_Formation);
        $editForm = $this->createForm('GestionBundle\Form\Type_FormationType', $type_Formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_formation_index');
        }

        return $this->render('type_formation/edit.html.twig', array(
            'type_Formation' => $type_Formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type_Formation entity.
     *
     * @Route("/{id}", name="type_formation_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $typeformation = $em->getRepository('GestionBundle:Type_Formation')->find($id);

        $em->remove($typeformation);
        $em->flush($typeformation);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );

        return $this->redirectToRoute('type_formation_index');
    }

    /**
     * Creates a form to delete a type_Formation entity.
     *
     * @param Type_Formation $type_Formation The type_Formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Type_Formation $type_Formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_formation_delete', array('id' => $type_Formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
