<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Departement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Departement controller.
 *
 * @Route("departement")
 */
class DepartementController extends Controller
{

    /**
     * Lists all departement entities.
     *
     * @Route("/", name="departement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $departements = $em->getRepository('GestionBundle:Departement')->findAll();

        return $this->render('departement/index.html.twig', array(
            'departements' => $departements,
        ));
    }

    /**
     * Creates a new departement entity.
     *
     * @Route("/new", name="departement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $departement = new Departement();
        $form = $this->createForm('GestionBundle\Form\DepartementType', $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departement);
            $em->flush($departement);
            $this->addFlash(
                'success',
                ', le département a été ajouter!'
            );
            return $this->redirectToRoute('departement_index');
        }

        return $this->render('departement/new.html.twig', array(
            'departement' => $departement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Lists all site entities.
     *
     * @Route("/fc/{lib}", name="departement_fc")
     * @Method("GET")
     */
    public function fcAction($lib)
    {
        $em = $this->getDoctrine()->getManager();
        $depatement = $em->getRepository('GestionBundle:Departement')->findOneBy(array('libelleDepartement' => $lib));//tout les site bil id

        if($depatement)
        {
            $depatement_id=$depatement->getId();
        }
        else {
            $depatement_id=null;
        }
        //die($site);
        $response = new JsonResponse(); // return une valeur json pour notre ajax
        return $response->setData(array('depatement_id'=>$depatement_id));//tarja3li
    }
    /**
     * Creates a new departement entity.
     *
     * @Route("/new1", name="departement_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {
        $departement = new Departement();
        $form = $this->createForm('GestionBundle\Form\DepartementType', $departement);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($departement);
            $em->flush($departement);
            $this->addFlash(
                'departement',
                ', le département a été ajoutee!'
            );
            return $this->redirectToRoute('departement_index');
        }

        return $this->render('departement/new1.html.twig', array(
            'departement' => $departement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a departement entity.
     *
     * @Route("show/{id}", name="departement_show")
     * @Method("GET")
     */
    public function showAction(Departement $departement)
    {
        $deleteForm = $this->createDeleteForm($departement);

        return $this->render('departement/show.html.twig', array(
            'departement' => $departement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing departement entity.
     *
     * @Route("/{id}/edit", name="departement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Departement $departement)
    {
        $editForm = $this->createForm('GestionBundle\Form\DepartementType', $departement);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'succes',
                ", Departement a été modifié!"
            );
            return $this->redirectToRoute('departement_index');
        }
        return $this->render('departement/edit.html.twig', array(
            'departement' => $departement,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a departement entity.
     *
     * @Route("/{id}", name="departement_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $departement = $em->getRepository('GestionBundle:Departement')->find($id);


        $em = $this->getDoctrine()->getManager();
        $em->remove($departement);
        $em->flush($departement);
        $this->addFlash(
            'deletesuccess',
            ', le département a été supprimé!'
        );
        return $this->redirectToRoute('departement_index');
    }
    /**
     * Creates a form to delete a departement entity.
     *
     * @param Departement $departement The departement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Departement $departement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departement_delete', array('id' => $departement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
