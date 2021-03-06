<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Evaluation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Evaluation controller.
 *
 * @Route("evaluation")
 */
class EvaluationController extends Controller
{
    /**
     * Lists all evaluation entities.
     *
     * @Route("/", name="evaluation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.context')->getToken()->getUser();

        $evaluations = array();

        if ( $user->getRole() == 'ROLE_ADMIN') {
            $evaluations = $em->getRepository('GestionBundle:Evaluation')->findAll();
        } else {
            $evaluations = $em->getRepository('GestionBundle:Evaluation')->findBy(array('employee' => $user ));
        }

        return $this->render('evaluation/index.html.twig', array(
            'evaluations' => $evaluations,
        ));
    }

    /**
     * Creates a new evaluation entity.
     *
     * @Route("/new", name="evaluation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evaluation = new Evaluation();
        $name=$request->get("nameemployee");
        $form = $this->createForm('GestionBundle\Form\EvaluationType', $evaluation);
        $form->handleRequest($request);
        $user = $this->get('security.context')->getToken()->getUser();
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $evaluation->setEmployee($user);
            $evaluation->setEmploye($name);
            $em->persist($evaluation);
            $moy=($evaluation->getAchaud()+$evaluation->getAfroid()+$evaluation->getDatePrevue()+$evaluation->getEfficace()+
                $evaluation->getMethodePedalogique()+$evaluation->getConference()+$evaluation->getSupportDeCours()+$evaluation->getLieu()
                +$evaluation->getDuree()+$evaluation->getRecpectHumain()+$evaluation->getContenueCours()+$evaluation->getTravauxPratique()+$evaluation->getObjectif()+
                $evaluation->getAmbianceGenerale())/14;
            $evaluation->setMoyenne(sprintf('%0.2f', $moy));


            $em->flush();
            $this->addFlash(
                'Evalution',
                ", l'évalution  a été ajouter!"
            );
            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/new.html.twig', array(
            'evaluation' => $evaluation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evaluation entity.
     *
     * @Route("show/{id}", name="evaluation_show")
     * @Method("GET")
     */
    public function showAction(Evaluation $evaluation)
    {
        $deleteForm = $this->createDeleteForm($evaluation);

        return $this->render('evaluation/show.html.twig', array(
            'evaluation' => $evaluation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evaluation entity.
     *
     * @Route("/{id}/edit", name="evaluation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evaluation $evaluation)
    {
        $deleteForm = $this->createDeleteForm($evaluation);
        $editForm = $this->createForm('GestionBundle\Form\EvaluationType', $evaluation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted()) {
            $moy=($evaluation->getAchaud()+$evaluation->getAfroid()+$evaluation->getDatePrevue()+$evaluation->getEfficace()+
                    $evaluation->getMethodePedalogique()+$evaluation->getConference()+$evaluation->getSupportDeCours()+$evaluation->getLieu()
                    +$evaluation->getDuree()+$evaluation->getRecpectHumain()+$evaluation->getContenueCours()+$evaluation->getTravauxPratique()+$evaluation->getObjectif()+
                    $evaluation->getAmbianceGenerale())/14;
            $evaluation->setMoyenne(sprintf('%0.2f', $moy));
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'Evalution',
                ", évalution  a été modiifer!"
            );
            return $this->redirectToRoute('evaluation_index');
        }

        return $this->render('evaluation/edit.html.twig', array(
            'evaluation' => $evaluation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evaluation entity.
     *
     * @Route("/{id}", name="evaluation_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $evlua = $em->getRepository('GestionBundle:Evaluation')->find($id);

        $em->remove($evlua);
        $em->flush();
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('evaluation_index');
    }

    /**
     * Creates a form to delete a evaluation entity.
     *
     * @param Evaluation $evaluation The evaluation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evaluation $evaluation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evaluation_delete', array('id' => $evaluation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
