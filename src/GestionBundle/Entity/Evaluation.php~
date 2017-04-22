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
     * @ORM\Column(name="Matricule", type="string",  nullable=true)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="effectue", type="integer")
     *  @Assert\Range(
     *      min = 0,
     *      max = 5,
     *      minMessage = "le numbre  {{ value }}doit etre >0",
     *      maxMessage = "le numbre  {{ value }}doit etre <5",
     *
     * )
     */
    private $effectue;

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
     * @ORM\Column(name="reference", type="boolean", nullable=true)
     */
    private $reference;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Evaluation
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set effectue
     *
     * @param string $effectue
     * @return Evaluation
     */
    public function setEffectue($effectue)
    {
        $this->effectue = $effectue;

        return $this;
    }

    /**
     * Get effectue
     *
     * @return string 
     */
    public function getEffectue()
    {
        return $this->effectue;
    }

    /**
     * Set afroid
     *
     * @param string $afroid
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
     * @return string 
     */
    public function getAfroid()
    {
        return $this->afroid;
    }

    /**
     * Set achaud
     *
     * @param string $achaud
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
     * @return string 
     */
    public function getAchaud()
    {
        return $this->achaud;
    }

    /**
     * Set reference
     *
     * @param boolean $reference
     * @return Evaluation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return boolean 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set datePrevue
     *
     * @param boolean $datePrevue
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
     * @return boolean 
     */
    public function getDatePrevue()
    {
        return $this->datePrevue;
    }

    /**
     * Set commantaire
     *
     * @param string $commantaire
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
     * @return string 
     */
    public function getCommantaire()
    {
        return $this->commantaire;
    }

    /**
     * Set methodePedalogique
     *
     * @param string $methodePedalogique
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
     * @return string 
     */
    public function getMethodePedalogique()
    {
        return $this->methodePedalogique;
    }

    /**
     * Set conference
     *
     * @param string $conference
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
     * @return string 
     */
    public function getConference()
    {
        return $this->conference;
    }

    /**
     * Set supportDeCours
     *
     * @param string $supportDeCours
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
     * @return string 
     */
    public function getSupportDeCours()
    {
        return $this->supportDeCours;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
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
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set duree
     *
     * @param string $duree
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
     * @return string 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set recpectHumain
     *
     * @param string $recpectHumain
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
     * @return string 
     */
    public function getRecpectHumain()
    {
        return $this->recpectHumain;
    }

    /**
     * Set ontenueCours
     *
     * @param string $ontenueCours
     * @return Evaluation
     */
    public function setOntenueCours($ontenueCours)
    {
        $this->ontenueCours = $ontenueCours;

        return $this;
    }

    /**
     * Get ontenueCours
     *
     * @return string 
     */
    public function getOntenueCours()
    {
        return $this->ontenueCours;
    }

    /**
     * Set travauxPratique
     *
     * @param string $travauxPratique
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
     * @return string 
     */
    public function getTravauxPratique()
    {
        return $this->travauxPratique;
    }

    /**
     * Set objectif
     *
     * @param string $objectif
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
     * @return string 
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set ambianceGenerale
     *
     * @param string $ambianceGenerale
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
     * @return string 
     */
    public function getAmbianceGenerale()
    {
        return $this->ambianceGenerale;
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
}
