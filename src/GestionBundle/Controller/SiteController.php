<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Site;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Site controller.
 *
 * @Route("site")
 */
class SiteController extends Controller
{
    /**
     * Lists all site entities.
     *
     * @Route("/", name="site_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sites = $em->getRepository('GestionBundle:Site')->findAll();

        return $this->render('site/index.html.twig', array(
            'sites' => $sites,
        ));
    }

    /**
     * Creates a new departement entity.
     *
     * @Route("/new", name="site_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $site = new Site();
        $form = $this->createForm('GestionBundle\Form\SiteType', $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush($site);

            return $this->redirectToRoute('site_index');
        }

        return $this->render('site/new.html.twig', array(
            'site' => $site,
            'form' => $form->createView(),
        ));
    }

    /**
     * Lists all site entities.
     *
     * @Route("/fc/{lib}", name="site_fc")
     * @Method("GET")
     */
    public function fcAction($lib)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('GestionBundle:Site')->findOneBy(array('libelleSite' => $lib));//tout les site bil id

        if($site)
        {
            $site_id=$site->getId();
        }
        else {
            $site_id=null;
        }
        //die($site);
         $response = new JsonResponse(); // return une valeur json pour notre ajax
        return $response->setData(array('site_id'=>$site_id));//tarja3li

    }

    /**
     * Creates a new departement entity.
     *
     * @Route("/new1", name="site_new1")
     * @Method({"GET", "POST"})
     */
    public function new1Action(Request $request)
    {
        $site = new Site();
        $form = $this->createForm('GestionBundle\Form\SiteType', $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($site);
            $em->flush($site);

            return $this->redirectToRoute('site_index');
        }

        return $this->render('site/new1.html.twig', array(
            'site' => $site,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a site entity.
     *
     * @Route("show/{id}", name="site_show")
     * @Method("GET")
     */
    public function showAction(Site $site)
    {
        $deleteForm = $this->createDeleteForm($site);

        return $this->render('site/show.html.twig', array(
            'site' => $site,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing site entity.
     *
     * @Route("/{id}/edit", name="site_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Site $site)
    {
       // $deleteForm = $this->createDeleteForm($site);
        $editForm = $this->createForm('GestionBundle\Form\SiteType', $site);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('site_index');// tab3thek lil index win tab3the q
        }

        return $this->render('site/edit.html.twig', array(
            'site' => $site,
            'edit_form' => $editForm->createView(),
           // 'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a site entity.
     *
     * @Route("/{id}", name="site_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('GestionBundle:Site')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($site);
        $em->flush($site);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );

        return $this->redirectToRoute('site_index');
    }
       

    /**
     * Creates a form to delete a site entity.
     *
     * @param Site $site The site entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Site $site)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('site_delete', array('id' => $site->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
