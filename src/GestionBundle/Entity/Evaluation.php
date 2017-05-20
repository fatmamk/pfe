<?php

namespace GestionBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\EvaluationRepository")
 */
class Evaluation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   


    /**
     * @var string
     *
     * @ORM\Column(name="afroid", type="integer",  nullable=true)
     */
    private $afroid;

    /**
     * @var string
     *
     * @ORM\Column(name="achaud", type="integer",  nullable=true)
     */
    private $achaud;



    /**
     * @var bool
     *
     * @ORM\Column(name="DatePrevue", type="integer", nullable=true)
     */
    private $datePrevue;

    /**
     * @var string
     *
     * @ORM\Column(name="commantaire", type="integer", nullable=true)
     */
    private $commantaire;

    /**
     * @var string
     *
     * @ORM\Column(name="methodePedalogique", type="integer", nullable=true)
     */
    private $methodePedalogique;

    /**
     * @var string
     *
     * @ORM\Column(name="conference", type="integer", nullable=true)
     */
    private $conference;

    /**
     * @var string
     *
     * @ORM\Column(name="supportDeCours", type="integer", nullable=true)
     */
    private $supportDeCours;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="integer", nullable=true)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="employe", type="string", length=20,nullable=true)
     */
    private $employe;
    /**
     * @var string
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="RecpectHumain", type="integer", nullable=true)
     */
    private $recpectHumain;

    /**
     * @var string
     *
     * @ORM\Column(name="contenueCours", type="integer", nullable=true)
     */
    private $contenueCours;

    /**
     * @var string
     *
     * @ORM\Column(name="efficace", type="integer", nullable=true)
     */
    private $efficace;
    /**
     * @var string
     *
     * @ORM\Column(name="moyenne", type="float", nullable=true)
     */
    private $moyenne;
    /**
     * @var string
     *
     * @ORM\Column(name="TravauxPratique", type="integer", nullable=true)
     */
    private $travauxPratique;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif", type="integer", nullable=true)
     */
    private $objectif;
    /**
     * @var string
     *
     * @ORM\Column(name="annimateur", type="integer", nullable=true)
     */
    private $annimateur;

    /**
     * @var string
     *
     * @ORM\Column(name="ambianceGenerale", type="integer", nullable=true)
     */
    private $ambianceGenerale;

    /**
     * @ORM\ManyToOne(targetEntity="Formation",inversedBy="evaluations" ,cascade={"persist"})
     * @ORM\JoinColumn(name="evaluationsFormation_id" ,referencedColumnName="id" , nullable=true, onDelete="SET NULL")
     */
    private $formation;




    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set afroid
     *
     * @param integer $afroid
     * @return Evaluation
     */
    public function setAfroid($afroid)
    {
        $this->afroid = $afroid;

        return $this;
    }

    /**
     * Get afroid
     *
     * @return integer 
     */
    public function getAfroid()
    {
        return $this->afroid;
    }

    /**
     * Set achaud
     *
     * @param integer $achaud
     * @return Evaluation
     */
    public function setAchaud($achaud)
    {
        $this->achaud = $achaud;

        return $this;
    }

    /**
     * Get achaud
     *
     * @return integer 
     */
    public function getAchaud()
    {
        return $this->achaud;
    }

    /**
     * Set datePrevue
     *
     * @param integer $datePrevue
     * @return Evaluation
     */
    public function setDatePrevue($datePrevue)
    {
        $this->datePrevue = $datePrevue;

        return $this;
    }

    /**
     * Get datePrevue
     *
     * @return integer 
     */
    public function getDatePrevue()
    {
        return $this->datePrevue;
    }

    /**
     * Set commantaire
     *
     * @param integer $commantaire
     * @return Evaluation
     */
    public function setCommantaire($commantaire)
    {
        $this->commantaire = $commantaire;

        return $this;
    }

    /**
     * Get commantaire
     *
     * @return integer 
     */
    public function getCommantaire()
    {
        return $this->commantaire;
    }

    /**
     * Set methodePedalogique
     *
     * @param integer $methodePedalogique
     * @return Evaluation
     */
    public function setMethodePedalogique($methodePedalogique)
    {
        $this->methodePedalogique = $methodePedalogique;

        return $this;
    }

    /**
     * Get methodePedalogique
     *
     * @return integer 
     */
    public function getMethodePedalogique()
    {
        return $this->methodePedalogique;
    }

    /**
     * Set conference
     *
     * @param integer $conference
     * @return Evaluation
     */
    public function setConference($conference)
    {
        $this->conference = $conference;

        return $this;
    }

    /**
     * Get conference
     *
     * @return integer 
     */
    public function getConference()
    {
        return $this->conference;
    }

    /**
     * Set supportDeCours
     *
     * @param integer $supportDeCours
     * @return Evaluation
     */
    public function setSupportDeCours($supportDeCours)
    {
        $this->supportDeCours = $supportDeCours;

        return $this;
    }

    /**
     * Get supportDeCours
     *
     * @return integer 
     */
    public function getSupportDeCours()
    {
        return $this->supportDeCours;
    }

    /**
     * Set lieu
     *
     * @param integer $lieu
     * @return Evaluation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return integer 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Evaluation
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set recpectHumain
     *
     * @param integer $recpectHumain
     * @return Evaluation
     */
    public function setRecpectHumain($recpectHumain)
    {
        $this->recpectHumain = $recpectHumain;

        return $this;
    }

    /**
     * Get recpectHumain
     *
     * @return integer 
     */
    public function getRecpectHumain()
    {
        return $this->recpectHumain;
    }

    /**
     * Set contenueCours
     *
     * @param integer $contenueCours
     * @return Evaluation
     */
    public function setContenueCours($contenueCours)
    {
        $this->contenueCours = $contenueCours;

        return $this;
    }

    /**
     * Get contenueCours
     *
     * @return integer 
     */
    public function getContenueCours()
    {
        return $this->contenueCours;
    }

    /**
     * Set efficace
     *
     * @param integer $efficace
     * @return Evaluation
     */
    public function setEfficace($efficace)
    {
        $this->efficace = $efficace;

        return $this;
    }

    /**
     * Get efficace
     *
     * @return integer 
     */
    public function getEfficace()
    {
        return $this->efficace;
    }

    /**
     * Set moyenne
     *
     * @param float $moyenne
     * @return Evaluation
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne
     *
     * @return float 
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set travauxPratique
     *
     * @param integer $travauxPratique
     * @return Evaluation
     */
    public function setTravauxPratique($travauxPratique)
    {
        $this->travauxPratique = $travauxPratique;

        return $this;
    }

    /**
     * Get travauxPratique
     *
     * @return integer 
     */
    public function getTravauxPratique()
    {
        return $this->travauxPratique;
    }

    /**
     * Set objectif
     *
     * @param integer $objectif
     * @return Evaluation
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get objectif
     *
     * @return integer 
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set annimateur
     *
     * @param integer $annimateur
     * @return Evaluation
     */
    public function setAnnimateur($annimateur)
    {
        $this->annimateur = $annimateur;

        return $this;
    }

    /**
     * Get annimateur
     *
     * @return integer 
     */
    public function getAnnimateur()
    {
        return $this->annimateur;
    }

    /**
     * Set ambianceGenerale
     *
     * @param integer $ambianceGenerale
     * @return Evaluation
     */
    public function setAmbianceGenerale($ambianceGenerale)
    {
        $this->ambianceGenerale = $ambianceGenerale;

        return $this;
    }

    /**
     * Get ambianceGenerale
     *
     * @return integer 
     */
    public function getAmbianceGenerale()
    {
        return $this->ambianceGenerale;
    }

    /**
     * Set formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Evaluation
     */
    public function setFormation(\GestionBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \GestionBundle\Entity\Formation 
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set employe
     *
     * @param string $employe
     * @return Evaluation
     */
    public function setEmploye($employe)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return string 
     */
    public function getEmploye()
    {
        return $this->employe;
    }
}
