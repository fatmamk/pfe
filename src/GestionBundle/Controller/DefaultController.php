<?php

namespace GestionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $absenceRepository = $em->getRepository('GestionBundle:Absence');

        $absence01 =  $absenceRepository->absenceCount("01");
        $absence02 =  $absenceRepository->absenceCount("02");
        $absence03 =  $absenceRepository->absenceCount("03");
        $absence04 =  $absenceRepository->absenceCount("04");
        $absence05 =  $absenceRepository->absenceCount("05");
        $absence06 =  $absenceRepository->absenceCount("06");
        $absence07 =  $absenceRepository->absenceCount("07");
        $absence08 =  $absenceRepository->absenceCount("08");
        $absence09 =  $absenceRepository->absenceCount("09");
        $absence10 =  $absenceRepository->absenceCount("10");
        $absence11 =  $absenceRepository->absenceCount("11");
        $absence12 =  $absenceRepository->absenceCount("12");



        $absenceRepository = $em->getRepository('GestionBundle:DemandeConge');
        $demandeCongeCount01 =  $absenceRepository->demandeCongeCount("01");
        $demandeCongeCount02 =  $absenceRepository->demandeCongeCount("02");
        $demandeCongeCount03 =  $absenceRepository->demandeCongeCount("03");
        $demandeCongeCount04 =  $absenceRepository->demandeCongeCount("04");
        $demandeCongeCount05 =  $absenceRepository->demandeCongeCount("05");
        $demandeCongeCount06 =  $absenceRepository->demandeCongeCount("06");
        $demandeCongeCount07 =  $absenceRepository->demandeCongeCount("07");
        $demandeCongeCount08 =  $absenceRepository->demandeCongeCount("08");
        $demandeCongeCount09 =  $absenceRepository->demandeCongeCount("09");
        $demandeCongeCount10 =  $absenceRepository->demandeCongeCount("10");
        $demandeCongeCount11 =  $absenceRepository->demandeCongeCount("11");
        $demandeCongeCount12 =  $absenceRepository->demandeCongeCount("12");


        $demandeFormationRepository = $em->getRepository('GestionBundle:Demande_Formation');
        $demandeFormation01 =  $demandeFormationRepository->demandeFormationCount("01");
        $demandeFormation02 =  $demandeFormationRepository->demandeFormationCount("02");
        $demandeFormation03 =  $demandeFormationRepository->demandeFormationCount("03");
        $demandeFormation04 =  $demandeFormationRepository->demandeFormationCount("04");
        $demandeFormation05 =  $demandeFormationRepository->demandeFormationCount("05");
        $demandeFormation06 =  $demandeFormationRepository->demandeFormationCount("06");
        $demandeFormation07 =  $demandeFormationRepository->demandeFormationCount("07");
        $demandeFormation08 =  $demandeFormationRepository->demandeFormationCount("08");
        $demandeFormation09 =  $demandeFormationRepository->demandeFormationCount("09");
        $demandeFormation10 =  $demandeFormationRepository->demandeFormationCount("10");
        $demandeFormation11 =  $demandeFormationRepository->demandeFormationCount("11");
        $demandeFormation12 =  $demandeFormationRepository->demandeFormationCount("12");

        $formationRepository= $em->getRepository('GestionBundle:Formation');
        $formation01 =  $formationRepository->formationCount("01");
        $formation02 =  $formationRepository->formationCount("02");
        $formation03 =  $formationRepository->formationCount("03");
        $formation04 =  $formationRepository->formationCount("04");
        $formation05 =  $formationRepository->formationCount("05");
        $formation06 =  $formationRepository->formationCount("06");
        $formation07 =  $formationRepository->formationCount("07");
        $formation08 =  $formationRepository->formationCount("08");
        $formation09 =  $formationRepository->formationCount("09");
        $formation10 =  $formationRepository->formationCount("10");
        $formation11 =  $formationRepository->formationCount("11");
        $formation12 =  $formationRepository->formationCount("12");



        return $this->render('GestionBundle:Default:index.html.twig', array(
            "absence01" => $absence01,
            "absence02" => $absence02,
            "absence03" => $absence03,
            "absence04" => $absence04,
            "absence05" => $absence05,
            "absence06" => $absence06,
            "absence07" => $absence07,
            "absence08" => $absence08,
            "absence09" => $absence09,
            "absence10" => $absence10,
            "absence11" => $absence11,
            "absence12" => $absence12,
            "demandeCongeCount01" => $demandeCongeCount01,
            "demandeCongeCount02" => $demandeCongeCount02,
            "demandeCongeCount03" => $demandeCongeCount03,
            "demandeCongeCount04" => $demandeCongeCount04,
            "demandeCongeCount05" => $demandeCongeCount05,
            "demandeCongeCount06" => $demandeCongeCount06,
            "demandeCongeCount07" => $demandeCongeCount07,
            "demandeCongeCount08" => $demandeCongeCount08,
            "demandeCongeCount09" => $demandeCongeCount09,
            "demandeCongeCount10" => $demandeCongeCount10,
            "demandeCongeCount11" => $demandeCongeCount11,
            "demandeCongeCount12" => $demandeCongeCount12,
            "formation01" => $formation01,
            "formation02" => $formation02,
            "formation03" => $formation03,
            "formation04" => $formation04,
            "formation05" => $formation05,
            "formation06" => $formation06,
            "formation07" => $formation07,
            "formation08" => $formation08,
            "formation09" => $formation09,
            "formation10" => $formation10,
            "formation11" => $formation11,
            "formation12" => $formation12,
            "demandeFormation01" => $demandeFormation01,
            "demandeFormation02" => $demandeFormation02,
            "demandeFormation03" => $demandeFormation03,
            "demandeFormation04" => $demandeFormation04,
            "demandeFormation05" => $demandeFormation05,
            "demandeFormation06" => $demandeFormation06,
            "demandeFormation07" => $demandeFormation07,
            "demandeFormation08" => $demandeFormation08,
            "demandeFormation09" => $demandeFormation09,
            "demandeFormation10" => $demandeFormation10,
            "demandeFormation11" => $demandeFormation11,
            "demandeFormation12" => $demandeFormation12
        ));
    }
}
