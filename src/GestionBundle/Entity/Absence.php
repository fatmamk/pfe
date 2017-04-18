<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absence")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\AbsenceRepository")
 */
class Absence
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
     * @ORM\Column(name="Justifier", type="string", length=50)
     */
    private $justifier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=30)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="Integere", type="string", length=30)
     */
    private $integere;

    /**
     * @var string
     *
     * @ORM\Column(name="Commentaire", type="string", length=50)
     */
    private $commentaire;


    /**
     *@ORM\ManyToOne(targetEntity="NatureAbsence",inversedBy="nature_absences")
     *@ORM\JoinColumn(name="nature_id" ,referencedColumnName="id")
     */
    private $nature;

    /**
     *@ORM\ManyToOne(targetEntity="Employee",inversedBy="absences")
     *@ORM\JoinColumn(name="employee_id" ,referencedColumnName="id")
     */
    private $employee;
   



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
     * Set justifier
     *
     * @param string $justifier
     * @return Absence
     */
    public function setJustifier($justifier)
    {
        $this->justifier = $justifier;

        return $this;
    }

    /**
     * Get justifier
     *
     * @return string 
     */
    public function getJustifier()
    {
        return $this->justifier;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Absence
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
     * @return Absence
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
     * Set etat
     *
     * @param string $etat
     * @return Absence
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
     * Set integere
     *
     * @param string $integere
     * @return Absence
     */
    public function setIntegere($integere)
    {
        $this->integere = $integere;

        return $this;
    }

    /**
     * Get integere
     *
     * @return string 
     */
    public function getIntegere()
    {
        return $this->integere;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Absence
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set nature
     *
     * @param \GestionBundle\Entity\NatureAbsence $nature
     * @return Absence
     */
    public function setNature(\GestionBundle\Entity\NatureAbsence $nature = null)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return \GestionBundle\Entity\NatureAbsence 
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set employee
     *
     * @param \GestionBundle\Entity\Employee $employee
     * @return Absence
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
