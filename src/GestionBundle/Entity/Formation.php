<?php

namespace GestionBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="titre", type="string", length=30,nullable=true)
     */
    private $titre;


    /**
     * @var string
     *
     * @ORM\Column(name="objectif", type="string", length=255,nullable=true)
     */
    private $objectif;
   

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255,nullable=true)
     */

    private $lieu;

   
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255,nullable=true)
     */
    private $etat;



    /**
     * @var string
     *
     * @ORM\Column(name="CoutImateriel", type="string", length=255,nullable=true)
     */
    private $coutImateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="coutMateriel", type="string", length=255,nullable=true)
     */
    private $coutMateriel;

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=255,nullable=true)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="FormateurInterne", type="boolean",nullable=true)
     */
    private $FormateurInterne;

    /**
     * @var string
     *
     * @ORM\Column(name="FormateurExterne", type="boolean",nullable=true)
     */
    private $FormateurExterne;


    /**
     * @var string
     *
     * @ORM\Column(name="contenue", type="string", length=255,nullable=true)
     */
    private $contenue;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reccurence", type="boolean",nullable=true)
     */
    
    private $reccurence;


    /**
     * @var integer
     *
     * @ORM\Column(name="chaque", type="integer",nullable=true)
     *  
     */

    private $chaque;


    /**
     *  @var string
     *
     * @ORM\Column(name="periode", type="string",nullable=true)
     */

    private $periode;

    /**
     *@var boolean
     *
     * @ORM\Column(name="finApres", type="boolean",nullable=true)
     */

    private $finApres;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="date_Debut", type="date", nullable=true)
     */
    private $dateDebut;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_Fin", type="date", nullable=true)
     *
     */

    private $dateFin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terminerA", type="boolean",nullable=true)
     */

    private $terminerA;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Ocurrancedate", type="date",nullable=true)
     */
    private $Ocurrancedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="OcurranceNbj", type="integer",nullable=true)
     */
    private $OcurranceNbj;


    /**
     * @ORM\ManyToOne(targetEntity="Type_Formation",inversedBy="formations",cascade={"persist"})
     * @ORM\JoinColumn(name="type_id" ,referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */


    private $typeFormation;




    /**
     * @ORM\ManyToMany(targetEntity="Employee", inversedBy="formations",cascade={"persist"})
     * @ORM\JoinTable(name="employees_id" )
     */

    private $employees;


    /**
     * @ORM\OneToMany(targetEntity="Fichier", mappedBy="fichiers")
     */

    private $formation;

    /**
     * @ORM\OneToMany(targetEntity="Jour", mappedBy="formation")
     */

    private $jours;
    /**
     *@ORM\ManyToOne(targetEntity="Employee",inversedBy="employeeinterne" ,cascade={"persist"})
     *@ORM\JoinColumn(name="employeeinterne_id" ,referencedColumnName="id")
     */
    private $formationsemployee;
    
    
    /**
     * @ORM\OneToOne(targetEntity="Demande_Formation",inversedBy="formation" )
     * @ORM\JoinColumn(name="demande_formation_id" ,referencedColumnName="id" , nullable=true, onDelete="SET NULL")
     */
    private $demandeFormation;

    /**
     * @ORM\ManyToOne(targetEntity="Formateur",inversedBy="formation" ,cascade={"persist"})
     * @ORM\JoinColumn(name="formateur_id" ,referencedColumnName="id" , nullable=true, onDelete="SET NULL")
     */
    private $formateur;


    public function __toString() {
        return $this->titre;
    }
    

   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jours = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set titre
     *
     * @param string $titre
     * @return Formation
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set objectif
     *
     * @param string $objectif
     * @return Formation
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
     * Set lieu
     *
     * @param string $lieu
     * @return Formation
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
     * Set etat
     *
     * @param string $etat
     * @return Formation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set coutImateriel
     *
     * @param string $coutImateriel
     * @return Formation
     */
    public function setCoutImateriel($coutImateriel)
    {
        $this->coutImateriel = $coutImateriel;

        return $this;
    }

    /**
     * Get coutImateriel
     *
     * @return string 
     */
    public function getCoutImateriel()
    {
        return $this->coutImateriel;
    }

    /**
     * Set coutMateriel
     *
     * @param string $coutMateriel
     * @return Formation
     */
    public function setCoutMateriel($coutMateriel)
    {
        $this->coutMateriel = $coutMateriel;

        return $this;
    }

    /**
     * Get coutMateriel
     *
     * @return string 
     */
    public function getCoutMateriel()
    {
        return $this->coutMateriel;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Formation
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set FormateurInterne
     *
     * @param boolean $formateurInterne
     * @return Formation
     */
    public function setFormateurInterne($formateurInterne)
    {
        $this->FormateurInterne = $formateurInterne;

        return $this;
    }

    /**
     * Get FormateurInterne
     *
     * @return boolean 
     */
    public function getFormateurInterne()
    {
        return $this->FormateurInterne;
    }

    /**
     * Set FormateurExterne
     *
     * @param boolean $formateurExterne
     * @return Formation
     */
    public function setFormateurExterne($formateurExterne)
    {
        $this->FormateurExterne = $formateurExterne;

        return $this;
    }

    /**
     * Get FormateurExterne
     *
     * @return boolean 
     */
    public function getFormateurExterne()
    {
        return $this->FormateurExterne;
    }

    /**
     * Set contenue
     *
     * @param string $contenue
     * @return Formation
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get contenue
     *
     * @return string 
     */
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * Set reccurence
     *
     * @param boolean $reccurence
     * @return Formation
     */
    public function setReccurence($reccurence)
    {
        $this->reccurence = $reccurence;

        return $this;
    }

    /**
     * Get reccurence
     *
     * @return boolean 
     */
    public function getReccurence()
    {
        return $this->reccurence;
    }

    /**
     * Set chaque
     *
     * @param integer $chaque
     * @return Formation
     */
    public function setChaque($chaque)
    {
        $this->chaque = $chaque;

        return $this;
    }

    /**
     * Get chaque
     *
     * @return integer 
     */
    public function getChaque()
    {
        return $this->chaque;
    }

    /**
     * Set periode
     *
     * @param string $periode
     * @return Formation
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return string 
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set finApres
     *
     * @param boolean $finApres
     * @return Formation
     */
    public function setFinApres($finApres)
    {
        $this->finApres = $finApres;

        return $this;
    }

    /**
     * Get finApres
     *
     * @return boolean 
     */
    public function getFinApres()
    {
        return $this->finApres;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Formation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Formation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set terminerA
     *
     * @param boolean $terminerA
     * @return Formation
     */
    public function setTerminerA($terminerA)
    {
        $this->terminerA = $terminerA;

        return $this;
    }

    /**
     * Get terminerA
     *
     * @return boolean 
     */
    public function getTerminerA()
    {
        return $this->terminerA;
    }

    /**
     * Set Ocurrancedate
     *
     * @param \DateTime $ocurrancedate
     * @return Formation
     */
    public function setOcurrancedate($ocurrancedate)
    {
        $this->Ocurrancedate = $ocurrancedate;

        return $this;
    }

    /**
     * Get Ocurrancedate
     *
     * @return \DateTime 
     */
    public function getOcurrancedate()
    {
        return $this->Ocurrancedate;
    }

    /**
     * Set OcurranceNbj
     *
     * @param integer $ocurranceNbj
     * @return Formation
     */
    public function setOcurranceNbj($ocurranceNbj)
    {
        $this->OcurranceNbj = $ocurranceNbj;

        return $this;
    }

    /**
     * Get OcurranceNbj
     *
     * @return integer 
     */
    public function getOcurranceNbj()
    {
        return $this->OcurranceNbj;
    }

    /**
     * Set typeFormation
     *
     * @param \GestionBundle\Entity\Type_Formation $typeFormation
     * @return Formation
     */
    public function setTypeFormation(\GestionBundle\Entity\Type_Formation $typeFormation = null)
    {
        $this->typeFormation = $typeFormation;

        return $this;
    }

    /**
     * Get typeFormation
     *
     * @return \GestionBundle\Entity\Type_Formation 
     */
    public function getTypeFormation()
    {
        return $this->typeFormation;
    }

    /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Formation
     */
    public function addEmployee(\GestionBundle\Entity\Employee $employees)
    {
        $this->employees[] = $employees;

        return $this;
    }

    /**
     * Remove employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     */
    public function removeEmployee(\GestionBundle\Entity\Employee $employees)
    {
        $this->employees->removeElement($employees);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Add formation
     *
     * @param \GestionBundle\Entity\Fichier $formation
     * @return Formation
     */
    public function addFormation(\GestionBundle\Entity\Fichier $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \GestionBundle\Entity\Fichier $formation
     */
    public function removeFormation(\GestionBundle\Entity\Fichier $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Add jours
     *
     * @param \GestionBundle\Entity\Jour $jours
     * @return Formation
     */
    public function addJour(\GestionBundle\Entity\Jour $jours)
    {
        $this->jours[] = $jours;

        return $this;
    }

    /**
     * Remove jours
     *
     * @param \GestionBundle\Entity\Jour $jours
     */
    public function removeJour(\GestionBundle\Entity\Jour $jours)
    {
        $this->jours->removeElement($jours);
    }

    /**
     * Get jours
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * Set formationsemployee
     *
     * @param \GestionBundle\Entity\Employee $formationsemployee
     * @return Formation
     */
    public function setFormationsemployee(\GestionBundle\Entity\Employee $formationsemployee = null)
    {
        $this->formationsemployee = $formationsemployee;

        return $this;
    }

    /**
     * Get formationsemployee
     *
     * @return \GestionBundle\Entity\Employee 
     */
    public function getFormationsemployee()
    {
        return $this->formationsemployee;
    }

    /**
     * Set demandeFormation
     *
     * @param \GestionBundle\Entity\Demande_Formation $demandeFormation
     * @return Formation
     */
    public function setDemandeFormation(\GestionBundle\Entity\Demande_Formation $demandeFormation = null)
    {
        $this->demandeFormation = $demandeFormation;

        return $this;
    }

    /**
     * Get demandeFormation
     *
     * @return \GestionBundle\Entity\Demande_Formation 
     */
    public function getDemandeFormation()
    {
        return $this->demandeFormation;
    }

    /**
     * Set formateur
     *
     * @param \GestionBundle\Entity\Formateur $formateur
     * @return Formation
     */
    public function setFormateur(\GestionBundle\Entity\Formateur $formateur = null)
    {
        $this->formateur = $formateur;

        return $this;
    }

    /**
     * Get formateur
     *
     * @return \GestionBundle\Entity\Formateur 
     */
    public function getFormateur()
    {
        return $this->formateur;
    }
}
