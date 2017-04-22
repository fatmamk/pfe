<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Employee;
use GestionBundle\Entity\Formation;
use GestionBundle\Entity\Jour;
use GestionBundle\Form\FormationType;
use GestionBundle\Form\JourType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Formation controller.
 *
 * @Route("formation")
 */
class FormationController extends Controller
{
    /**
     * Lists all formation entities.
     *
     * @Route("/", name="formation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $formations = $em->getRepository('GestionBundle:Formation')->findAll();

        if($formations){

            foreach($formations as $formation){


                if ($formation-> getDateDebut()->format('Y-m-d') < date('Y-m-d') && $formation->getDateFin()->format('Y-m-d') > date('Y-m-d'))
                    $formation->setEtat("En cours");

                else if ($formation-> getDateDebut()->format('Y-m-d') > date('Y-m-d'))
                    $formation->setEtat("Programmée");
                else
                    $formation->setEtat("Terminée");
                //$this->debug_to_console($formation->getDateDebut()->format('Y-m-d'));
            }
            $em->persist($formation);
            $em->flush();
        }


        return $this->render('formation/index.html.twig', array(
            'formations' => $formations,
        ));
    }

    /**
     * Creates a new formation entity.
     *
     * @Route("/new", name="formation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm('GestionBundle\Form\FormationType', $formation);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            //nb jours between 2 date and generate jours fields
            $int=date_diff($formation->getDateDebut(), $formation->getDateFin());
            $dif=$int->format('%a');

            for ($i = 1; $i <= $dif+1; $i++) {

                ${'jour'.'$i'} = new Jour();
                ${'jour'.'$i'}->setFormation($formation);
                $formation->getJours()->add(${'jour'.'$i'});

            }
            if($formation->getReccurence()=='0')
                $formation->setFinApres(null);

            $formation->setEtat("Programmée");
            $em->persist($formation);
            $em->flush($formation);

            return $this->redirectToRoute('formation_index');
        }

        return $this->render('formation/new.html.twig', array(
            'demande_Formation' => $formation,
            'form' => $form->createView(),
        ));


    }


    /**
     * Creates a new formation entity.
     *
     * @Route("/new1", name="formation_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {
        $formation = new Formation();
        $form = $this->createForm('GestionBundle\Form\FormationType', $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $id =$formation->getDemandeFormation();
            $em = $this->getDoctrine()->getManager();

            //nb jours between 2 date and generate jours fields
            $int=date_diff($formation->getDateDebut(), $formation->getDateFin());
            $dif=$int->format('%a');

            for ($i = 1; $i <= $dif+1; $i++) {

                ${'jour'.'$i'} = new Jour();
                ${'jour'.'$i'}->setFormation($formation);
                $formation->getJours()->add(${'jour'.'$i'});

            }
            $demandeformation=$em->getRepository('GestionBundle:Demande_Formation')->findOneBy(array('id'=>$id))->SetEtat("accepter");
            $em->persist($demandeformation);
            $em->flush($demandeformation);
            $formation->setEtat('Programmée');
            $em->persist($formation);
            $em->flush($formation);

            return $this->redirectToRoute('formation_index');
        }

        return $this->render('formation/new1.html.twig', array(
            'formation' => $formation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a formation entity.
     *
     * @Route("show/{id}", name="formation_show")
     * @Method("GET")
     */
    public function showAction(Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);

        return $this->render('formation/show.html.twig', array(
            'formation' => $formation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing formation entity.
     *
     * @Route("/{id}/edit", name="formation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Formation $formation)
    {
        $deleteForm = $this->createDeleteForm($formation);
        $editForm = $this->createForm('GestionBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $int=date_diff($formation->getDateDebut(), $formation->getDateFin());
            $dif=$int->format('%a');
            $length=$formation->getJours()->count();/*length nombre de jour le9dima*/

            if($dif>$length)
                for ($i = 1; $i <= $dif+1-$length; $i++) {

                    ${'jour'.'$i'} = new Jour();
                    ${'jour'.'$i'}->setFormation($formation);
                    $formation->getJours()->add(${'jour'.'$i'});

                }
            else if($dif<$length)
                for ($i = $dif+1; $i <= $length-1; $i++) {

                    $formation->getJours()->remove($i);

                }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formation_index');
        }

        return $this->render('formation/edit.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing formation entity.
     *
     * @Route("/{id}/edit1", name="formation_edit1")
     * @Method({"GET", "POST"})
     */
    public function edit1Action(Request $request, Formation $formation)
    {

        $editForm = $this->createForm('GestionBundle\Form\FormationType', $formation);
        $editForm->handleRequest($request);



        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();


            return $this->redirectToRoute('formation_index');

        }
        return $this->render('formation/edit1.html.twig', array(
            'formation' => $formation,
            'edit_form' => $editForm->createView(),

        ));
    }

    /**
     * Deletes a formation entity.
     *
     * @Route("/{id}", name="formation_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $demandeFormation = $em->getRepository('GestionBundle:Formation')->find($id);

        $em->remove($demandeFormation);
        $em->flush($demandeFormation);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );
        return $this->redirectToRoute('formation_index');
    }

    /**
     * Creates a form to delete a formation entity.
     *
     * @param Formation $formation The formation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Formation $formation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('formation_delete', array('id' => $formation->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
