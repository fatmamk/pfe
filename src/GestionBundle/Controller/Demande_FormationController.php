<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Demande_Formation;
use GestionBundle\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demande_formation controller.
 *
 * @Route("demande_formation")
 */
class Demande_FormationController extends Controller
{
    /**
     * Lists all demande_Formation entities.
     *
     * @Route("/", name="demande_formation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();


        $demande_Formations = $em->getRepository('GestionBundle:Demande_Formation')->findAll();

        return $this->render('demande_formation/index.html.twig', array(
            'demande_Formations' => $demande_Formations,
        ));
    }

    /**
     * Creates a new demande_Formation entity.
     *
     * @Route("/new", name="demande_formation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $demande_Formation = new Demande_formation();
        $form = $this->createForm('GestionBundle\Form\Demande_FormationType', $demande_Formation);
        $form->handleRequest($request);
        $user = $this->get('security.context')->getToken()->getUser();
        //$name=$request->get("nameemployee");
        if ($form->isSubmitted() ) {
            $demande_Formation->setEmployee($user);
            $em = $this->getDoctrine()->getManager();
            $demande_Formation->setEtat("En attente");
            $em->persist($demande_Formation);
            $em->flush($demande_Formation);

            return $this->redirectToRoute('demande_formation_index');
        }

        return $this->render('demande_formation/new.html.twig', array(
            'demande_Formation' => $demande_Formation,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a demande_Formation entity.
     *
     * @Route("show/{id}", name="demande_formation_show")
     * @Method("GET")
     */
    public function showAction(Demande_Formation $demande_Formation)
    {
        $deleteForm = $this->createDeleteForm($demande_Formation);

        return $this->render('demande_formation/show.html.twig', array(
            'demande_Formation' => $demande_Formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demande_Formation entity.
     *
     * @Route("/{id}/edit", name="demande_formation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Demande_Formation $demande_Formation)
    {
        $em = $this->getDoctrine()->getManager();
        $deleteForm = $this->createDeleteForm($demande_Formation);
        $editForm = $this->createForm('GestionBundle\Form\Demande_FormationType', $demande_Formation);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() ) {

            $p=$demande_Formation->getEtat();
            if($p=='En attente')
            {
                $demande_Formation->setEtat('En attente');
                $em->persist($demande_Formation);
                $em->flush($demande_Formation);
            }

            if($p=='accepter')
            {
                $demande_Formation->setEtat('accepter');
                $em->persist($demande_Formation);
                $em->flush($demande_Formation);
            }
            if($p=='Refusee')
            {
                $demande_Formation->setEtat('Refusee');
                $em->persist($demande_Formation);
                $em->flush($demande_Formation);
            }



            return $this->redirectToRoute('demande_formation_index');
        }

        return $this->render('demande_formation/edit.html.twig', array(
            'demande_Formation' => $demande_Formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a new formation entity.
     *
     * @Route("/refusee/{id}", name="demande_formation_refusee")
     * @Method({"GET"})
     */
    public function Refussee($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandeformation=$em->getRepository('GestionBundle:Demande_Formation')->find($id);
        $demandeformation->SetEtat("Refusee");
       // echo $demandeformation;
        //die;
        $em->persist($demandeformation);
        $em->flush($demandeformation);

        return $this->redirectToRoute('demande_formation_index');
    }


    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/accepte/{id}", name="demande_formation_accepte")
     * @Method({"GET"})
     */
    public function accepte($id)
    {
        $em = $this->getDoctrine()->getManager();
        $demandedormation=$em->getRepository('GestionBundle:Demande_Formation')->find($id);
        $demandedormation->setEtat("accepter");
        // echo $demandeformation;
        //die;
        $em->persist($demandedormation);
        $em->flush($demandedormation);

        return $this->redirectToRoute('demande_formation_index');
    }

    /**
     * Deletes a demande_Formation entity.
     *
     * @Route("/{id}", name="demande_formation_delete")
     * @Method("GET")
     */




    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $df = $em->getRepository('GestionBundle:Demande_Formation')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($df);
        $em->flush($df);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('demande_formation_index');
    }

    /**
     * Creates a form to delete a demande_Formation entity.
     *
     * @param Demande_Formation $demande_Formation The demande_Formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demande_Formation $demande_Formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demande_formation_delete', array('id' => $demande_Formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
