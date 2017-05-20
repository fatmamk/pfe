<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande_Formation
 *
 * @ORM\Table(name="demande__formation")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\Demande_FormationRepository")
 */
class Demande_Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer" , nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Dedemande", type="date",nullable=true)
     */

    private $dateDedemande;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_souhaite", type="date",nullable=true)
     */

    private $dateSouhaite;
    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=30)
     */
    private $theme;
    /**
     * @var string
     *
     * @ORM\Column(name="employe", type="string", length=30, nullable=true)
     */
    private $employe;
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Justification", type="string", length=255)
     */
    private $justification;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     *@ORM\OneToOne(targetEntity="Formation",mappedBy="demandeFormation")
     */
    private $formation;

    /**
     *@ORM\ManyToOne(targetEntity="Employee",inversedBy="employeDemande",cascade={"persist"})
     *@ORM\JoinColumn(name="employe_id",referencedColumnName="id" )
     */
    private $employee;

    public function __toString()
    {
        return (string) $this->getId();
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
     * Set dateDedemande
     *
     * @param \DateTime $dateDedemande
     * @return Demande_Formation
     */
    public function setDateDedemande($dateDedemande)
    {
        $this->dateDedemande = $dateDedemande;

        return $this;
    }

    /**
     * Get dateDedemande
     *
     * @return \DateTime 
     */
    public function getDateDedemande()
    {
        return $this->dateDedemande;
    }

    /**
     * Set dateSouhaite
     *
     * @param \DateTime $dateSouhaite
     * @return Demande_Formation
     */
    public function setDateSouhaite($dateSouhaite)
    {
        $this->dateSouhaite = $dateSouhaite;

        return $this;
    }

    /**
     * Get dateSouhaite
     *
     * @return \DateTime 
     */
    public function getDateSouhaite()
    {
        return $this->dateSouhaite;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Demande_Formation
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
     * Set employe
     *
     * @param string $employe
     * @return Demande_Formation
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

    /**
     * Set description
     *
     * @param string $description
     * @return Demande_Formation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set justification
     *
     * @param string $justification
     * @return Demande_Formation
     */
    public function setJustification($justification)
    {
        $this->justification = $justification;

        return $this;
    }

    /**
     * Get justification
     *
     * @return string 
     */
    public function getJustification()
    {
        return $this->justification;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Demande_Formation
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
     * Set formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Demande_Formation
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
     * Set employee
     *
     * @param \GestionBundle\Entity\Employee $employee
     * @return Demande_Formation
     */
    public function setEmployee(\GestionBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \GestionBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
