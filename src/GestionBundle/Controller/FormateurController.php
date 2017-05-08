<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Formateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Formateur controller.
 *
 * @Route("formateur")
 */
class FormateurController extends Controller
{
    /**
     * Lists all formateur entities.
     *
     * @Route("/", name="formateur_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formateurs = $em->getRepository('GestionBundle:Formateur')->findAll();

        return $this->render('formateur/index.html.twig', array(
            'formateurs' => $formateurs,
        ));
    }

    /**
     * Creates a new formateur entity.
     *
     * @Route("/new", name="formateur_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $formateur = new Formateur();
        $form = $this->createForm('GestionBundle\Form\FormateurType', $formateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() ) {
            $formateur->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($formateur);
            $em->flush($formateur);

            return $this->redirectToRoute('formateur_index');
        }

        return $this->render('formateur/new.html.twig', array(
            'formateur' => $formateur,
            'form' => $form->createView(),
        ));
    }
    /**
     * Creates a new formateur entity.
     *
     * @Route("/new1", name="formateur_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {    $em = $this->getDoctrine()->getManager();
        $formateur = new Formateur();
        $form = $this->createForm('GestionBundle\Form\FormateurType', $formateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $formateur->upload();
            $em->persist($formateur);
            $em->flush($formateur);
            return $this->redirectToRoute('formateur_index');
        }

        return $this->render('formateur/new1.html.twig', array(
            'formateur' => $formateur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Lists all site entities.
     *
     * @Route("/fc/{nom}/{prenom}", name="formateur_fc")
     * @Method("GET")
     */
    public function fcAction($nom,$prenom)
    {
        $em = $this->getDoctrine()->getManager();
        $formateur = $em->getRepository('GestionBundle:Formateur')->findOneBy(array('nom' => $nom,'prenom'=>$prenom));//tout les site bil id

        if($formateur)
        {
            $formateur_id=$formateur->getId();
        }
        else {
            $formateur_id=null;
        }
        //die($site);
         $response = new JsonResponse(); // return une valeur json pour notre ajax
        return $response->setData(array('formateur_id'=>$formateur_id));//tarja3li

    }
    /**
     * Finds and displays a formateur entity.
     *
     * @Route("show/{id}", name="formateur_show")
     * @Method("GET")
     */
    public function showAction(Formateur $formateur)
    {
        $deleteForm = $this->createDeleteForm($formateur);

        return $this->render('formateur/show.html.twig', array(
            'formateur' => $formateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formateur entity.
     *
     * @Route("/{id}/edit", name="formateur_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Formateur $formateur)
    {
        $deleteForm = $this->createDeleteForm($formateur);
        $editForm = $this->createForm('GestionBundle\Form\FormateurType', $formateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formateur_index');
        }

        return $this->render('formateur/edit.html.twig', array(
            'formateur' => $formateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a formateur entity.
     *
     * @Route("/{id}", name="formateur_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $formateur = $em->getRepository('GestionBundle:Formateur')->find($id);

        $em->remove($formateur);
        $em->flush($formateur);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('formateur_index');
    }

    /**
     * Creates a form to delete a formateur entity.
     *
     * @param Formateur $formateur The formateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Formateur $formateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formateur_delete', array('id' => $formateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
