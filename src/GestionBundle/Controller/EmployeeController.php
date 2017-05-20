<?php

namespace GestionBundle\Controller;

use GestionBundle\FileSlim\Slim;
use GestionBundle\Entity\Employee;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Employee controller.
 *
 * @Route("employee")
 */
class EmployeeController extends Controller
{
    /**
     * Lists all employee entities.
     *
     * @Route("/", name="employee_index")
     * @Method("GET")
     */
    public function indexAction()
    {        $employee = new Employee();

        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('GestionBundle:Employee')->findAll();

        return $this->render('employee/index.html.twig', array(
            'employees' => $employees,
        ));

    }

    /**
     * Creates a new employee entity.
     *
     * @Route("/new", name="employee_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $employee = new Employee();
        $form = $this->createForm('GestionBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);


        if ($form->isSubmitted()) {

            if ( $request->request->get('imageFile') )//b3athha symfony
            {
                if (Slim::getImages("imageFile") ) //image mi slim
                {
                    $images = Slim::getImages("imageFile");
                    if ($images[0] )
                    {
                        $image=$images[0];
                        // Original file name
                        $name = $image['input']['name'];
                        // Base64 of the image
                        $data = $image['output']['data'];
                        // Server path
                        $path =  $this->get('kernel')->getRootDir() . '/../web/upload/images';//win tet7at taswira
                        // Save the file to the server
                        $file = Slim::saveFile($data, $name, $path);//tsagel dossier
                        // Get the absolute web path to the image
                        //$imagePath = asset('img/users/' . $file['name']);
                        $employee->setImageName($file['name']);//emlpoyee entity
                    }
                }

            }
            else
                $employee->setImageName(null);

            $em = $this->getDoctrine()->getManager();
            $employee->setPlainPassword('test');

            $em->persist($employee);
            $em->flush($employee);
            $this->addFlash(
                'success',
                ', la formation a été ajouté!'
            );





            return $this->redirectToRoute('employee_index');
        }

        return $this->render('employee/new.html.twig', array(
            'employee' => $employee,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a employee entity.
     *
     * @Route("show/{id}", name="employee_show")
     * @Method("GET")
     */
    public function showAction(Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', array(
            'employee' => $employee,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing employee entity.
     *
     * @Route("/{id}/edit", name="employee_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('GestionBundle\Form\EmployeeType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() ) {

            if ( $request->request->get('imageFile') )//b3athha symfony
            {
                $images = Slim::getImages("imageFile");
                if ($images) //image mi slim
                {
                    if ($images[0])
                    {
                        $image=$images[0];

                        // Original file name
                        $name = $image['input']['name'];
                        // Base64 of the image
                        $data = $image['output']['data'];
                        // Server path
                        $path =  $this->get('kernel')->getRootDir() . '/../web/upload/images';//win tet7at taswira

                        // Save the file to the server
                        $file = Slim::saveFile($data, $name, $path);//tsagel dossier

                        // Get the absolute web path to the image
                        //$imagePath = asset('img/users/' . $file['name']);

                        $employee->setImageName($file['name']);//emlpoyee entity
                    }
                }


            }
            else
                $employee->setImageName(null);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('employee_index');
        }

        return $this->render('employee/edit.html.twig', array(
            'employee' => $employee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a employee entity.
     *
     * @Route("/{id}", name="employee_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $site = $em->getRepository('GestionBundle:Employee')->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($site);
        $em->flush($site);
        $this->addFlash(
            'deletesuccess',
            ', la formation a été supprimé!'
        );


        return $this->redirectToRoute('employee_index');
    }

    /**
     * Creates a form to delete a employee entity.
     *
     * @param Employee $employee The employee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employee $employee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employee_delete', array('id' => $employee->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
   
    public function activeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('GestionBundle:Employee')->find($id);
        if($user->isEnabled()==true){
            $user->setEnabled(false);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info'," Compte est desactive.");
        }else{
            $user->setEnabled(true);
            $em->flush();
            $this->get('session')->getFlashBag()->add('info', " Compte est desactive.");
        }

        return $this->redirectToRoute('employee_index');

    }

    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/user/{id}", name="User")
     * @Method({"GET"})
     */
    public function promoteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository("GestionBundle:Employee")->find($id);
        $user->removeRole('ROLE_ADMIN');
        $user->addRole("ROLE_User");
        $em->persist($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', " modification enregistres .");

        return $this->redirectToRoute('employee_index');
    }
    /**
     * Creates a new demandeConge entity.
     *
     * @Route("/admin/{id}", name="Admin")
     * @Method({"GET"})
     */

    public function promoteAdminAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository("GestionBundle:Employee")->find($id);
        $user->addRole("ROLE_ADMIN");
        $em->persist($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', " modification enregistres .");

        return $this->redirectToRoute('employee_index');
    }

    public function SendMailAction(Request $request )
    {
        $emailto=$request->get("inputmail");
        if ($request->getMethod() == 'POST') {
            $message = \Swift_Message::newInstance()
                ->setSubject('Ropense')
                ->setFrom('codesymfony@gmail.com')
                ->setTo($emailto)
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody($request->get("contenutextarea"));
            $this->get('mailer')->send($message);
            $this->get('session')->getFlashBag()->add('success', " hahah");
            return $this->redirectToRoute('employee_index');
        }
    }
}
