<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Intergration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Intergration controller.
 *
 * @Route("intergration")
 */
class IntergrationController extends Controller
{
    /**
     * Lists all intergration entities.
     *
     * @Route("/", name="intergration_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $intergrations = $em->getRepository('GestionBundle:Intergration')->findAll();
        if($intergrations){

            foreach($intergrations as $integration) {


                if ($integration->getDateDebut()->format('Y-m-d') < date('Y-m-d') && $integration->getDateFin()->format('Y-m-d') > date('Y-m-d'))
                    $integration->setEtat("En cours");

                else if ($integration->getDateDebut()->format('Y-m-d') > date('Y-m-d'))
                    $integration->setEtat("Programmée");
                else
                    $integration->setEtat("Terminée");

            }
            $em->persist($integration);
            $em->flush();
        }


        return $this->render('intergration/index.html.twig', array(
            'intergrations' => $intergrations,
        ));
    }

    /**
     * Creates a new intergration entity.
     *
     * @Route("/new", name="intergration_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $intergration = new Intergration();
        $form = $this->createForm('GestionBundle\Form\IntergrationType', $intergration);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intergration);
            $em->flush($intergration);

            return $this->redirectToRoute('intergration_index');
        }

        return $this->render('intergration/new.html.twig', array(
            'intergration' => $intergration,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a intergration entity.
     *
     * @Route("/{id}", name="intergration_show")
     * @Method("GET")
     */
    public function showAction(Intergration $intergration)
    {
        $deleteForm = $this->createDeleteForm($intergration);

        return $this->render('intergration/show.html.twig', array(
            'intergration' => $intergration,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intergration entity.
     *
     * @Route("/{id}/edit", name="intergration_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Intergration $intergration)
    {
        $deleteForm = $this->createDeleteForm($intergration);
        $editForm = $this->createForm('GestionBundle\Form\IntergrationType', $intergration);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intergration_index');
        }

        return $this->render('intergration/edit.html.twig', array(
            'intergration' => $intergration,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a intergration entity.
     *
     * @Route("/{id}", name="intergration_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Intergration $intergration)
    {
        $form = $this->createDeleteForm($intergration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intergration);
            $em->flush($intergration);
        }

        return $this->redirectToRoute('intergration_index');
    }

    /**
     * Creates a form to delete a intergration entity.
     *
     * @param Intergration $intergration The intergration entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intergration $intergration)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intergration_delete', array('id' => $intergration->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
