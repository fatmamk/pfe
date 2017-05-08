<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Type_Conge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Type_conge controller.
 *
 * @Route("type_conge")
 */
class Type_CongeController extends Controller
{
    /**
     * Lists all type_Conge entities.
     *
     * @Route("/", name="type_conge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $type_Conges = $em->getRepository('GestionBundle:Type_Conge')->findAll();

        return $this->render('type_conge/index.html.twig', array(
            'type_Conges' => $type_Conges,
        ));
    }

    /**
     * Creates a new type_Conge entity.
     *
     * @Route("/new", name="type_conge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $type_Conge = new Type_conge();
        $form = $this->createForm('GestionBundle\Form\Type_CongeType', $type_Conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type_Conge);
            $em->flush($type_Conge);

            return $this->redirectToRoute('type_conge_index');
        }

        return $this->render('type_conge/new.html.twig', array(
            'type_Conge' => $type_Conge,
            'form' => $form->createView(),
        ));
    }
    /**
     * Creates a new type_Conge entity.
     *
     * @Route("/new1", name="type_conge_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {
        $type_Conge = new Type_conge();
        $form = $this->createForm('GestionBundle\Form\Type_CongeType', $type_Conge);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type_Conge);
            $em->flush($type_Conge);

            return $this->redirectToRoute('type_conge_index');
        }

        return $this->render('type_conge/new1.html.twig', array(
            'type_Conge' => $type_Conge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a type_Conge entity.
     *
     * @Route("show/{id}", name="type_conge_show")
     * @Method("GET")
     */
    public function showAction(Type_Conge $type_Conge)
    {
        $deleteForm = $this->createDeleteForm($type_Conge);

        return $this->render('type_conge/show.html.twig', array(
            'type_Conge' => $type_Conge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing type_Conge entity.
     *
     * @Route("/{id}/edit", name="type_conge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Type_Conge $type_Conge)
    {
        $deleteForm = $this->createDeleteForm($type_Conge);
        $editForm = $this->createForm('GestionBundle\Form\Type_CongeType', $type_Conge);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_conge_index');
        }

        return $this->render('type_conge/edit.html.twig', array(
            'type_Conge' => $type_Conge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a type_Conge entity.
     *
     * @Route("/{id}", name="type_conge_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $typeconge = $em->getRepository('GestionBundle:Type_Conge')->find($id);

        $em->remove($typeconge);
        $em->flush($typeconge);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('type_conge_index');
    }

    /**
     * Creates a form to delete a type_Conge entity.
     *
     * @param Type_Conge $type_Conge The type_Conge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Type_Conge $type_Conge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('type_conge_delete', array('id' => $type_Conge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Lists all site entities.
     *
     * @Route("/fc/{lib}", name="TypeConge_fc")
     * @Method("GET")
     */
    public function fcAction($lib)
    {
        $em = $this->getDoctrine()->getManager();
        $typeconge = $em->getRepository('GestionBundle:Type_Conge')->findOneBy(array('libelleType' => $lib));//tout les site bil id

        if($typeconge)
        {
            $typec_id=$typeconge->getId();
        }
        else {
            $typec_id=null;
        }
        //die($site);
        $response = new JsonResponse(); // return une valeur json pour notre ajax
        return $response->setData(array('site_id'=>$typec_id));//tarja3li

    }

}
