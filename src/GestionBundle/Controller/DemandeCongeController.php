<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\DemandeConge;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Demandeconge controller.
 *
 * @Route("demandeconge")
 */
class DemandeCongeController extends Controller
{
    /**
     * Lists all demandeConge entities.
     *
     * @Route("/", name="demandeconge_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.context')->getToken()->getUser();

        $demandeConges = array();

        if ( $user->getRole() == 'ROLE_ADMIN') {
            $demandeConges = $em->getRepository('GestionBundle:DemandeConge')->findAll();
        } else {
            $demandeConges = $em->getRepository('GestionBundle:DemandeConge')->findBy(array('employe' => $user));
        }


        return $this->render('demandeconge/index.html.twig', array(
            'demandeConges' => $demandeConges,
        ));
    }

    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/new", name="demandeconge_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $demandeConge = new Demandeconge();
        //$name=$request->get("nameemployee");
        $form = $this->createForm('GestionBundle\Form\DemandeCongeType', $demandeConge);
        $form->handleRequest($request);
        $user = $this->get('security.context')->getToken()->getUser();

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $demandeConge->setEmploye($user);
            $demandeConge->setStatutsConge("En attente");
            $em->persist($demandeConge);
            $em->flush($demandeConge);

            return $this->redirectToRoute('demandeconge_index');
        }

        return $this->render('demandeconge/new.html.twig', array(
            'demandeConge' => $demandeConge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/new1", name="demandeconge_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {
        $demandeConge = new Demandeconge();
        $form = $this->createForm('GestionBundle\Form\DemandeCongeType', $demandeConge);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demandeConge);
            $em->flush($demandeConge);

            return $this->redirectToRoute('demandeconge_index');
        }

        return $this->render('demandeconge/new1.html.twig', array(
            'demandeConge' => $demandeConge,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demandeConge entity.
     *
     * @Route("show/{id}", name="demandeconge_show")
     * @Method("GET")
     */
    public function showAction(DemandeConge $demandeConge)
    {
        $deleteForm = $this->createDeleteForm($demandeConge);

        return $this->render('demandeconge/show.html.twig', array(
            'demandeConge' => $demandeConge,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demandeConge entity.
     *
     * @Route("/{id}/edit", name="demandeconge_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DemandeConge $demandeConge)
    {

        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($demandeConge);
        $editForm = $this->createForm('GestionBundle\Form\DemandeCongeType', $demandeConge);
        $editForm->handleRequest($request);


        if ($editForm->isSubmitted() ) {

            $p=$demandeConge->getStatutsConge();
          
            if($p=='En attente')
            {
                $demandeConge->setStatutsConge('En attente');
                $em->persist($demandeConge);
                $em->flush($demandeConge);
            }

            if($p=='accepter')
            {
                $demandeConge->setStatutsConge('accepter');
                $em->persist($demandeConge);
                $em->flush($demandeConge);
            }
            if($p=='Refusee')
            {
                $demandeConge->setStatutsConge('Refusee');
                $em->persist($demandeConge);
                $em->flush($demandeConge);
            }

            return $this->redirectToRoute('demandeconge_index');
        }

        return $this->render('demandeconge/edit.html.twig', array(
            'demandeConge' => $demandeConge,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demandeConge entity.
     *
     * @Route("/{id}", name="demandeconge_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
     $em = $this->getDoctrine()->getManager();
        $demndeCnge = $em->getRepository('GestionBundle:DemandeConge')->find($id);

        $em->remove($demndeCnge);
        $em->flush($demndeCnge);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        
        return $this->redirectToRoute('demandeconge_index');
    }

    /**
     * Creates a form to delete a demandeConge entity.
     *
     * @param DemandeConge $demandeConge The demandeConge entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DemandeConge $demandeConge)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demandeconge_delete', array('id' => $demandeConge->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/accepte/{id}", name="demandeconge_accepte")
     * @Method({"GET"})
     */
    public function accepte($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandeConge=$em->getRepository('GestionBundle:DemandeConge')->find($id);
        $demandeConge->setStatutsConge("accepter");
        // echo $demandeformation;
        //die;
        $em->persist($demandeConge);
        $em->flush($demandeConge);

        return $this->redirectToRoute('demandeconge_index');
    }

    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/refusee/{id}", name="demandeconge_refuse")
     * @Method({"GET"})
     */
    public function Refusee($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandeConge=$em->getRepository('GestionBundle:DemandeConge')->find($id);
        $demandeConge->setStatutsConge("Refusee");
        // echo $demandeformation;
        //die;
        $em->persist($demandeConge);
        $em->flush($demandeConge);

        return $this->redirectToRoute('demandeconge_index');
    }
}
