<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intergration
 *
 * @ORM\Table(name="intergration")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\IntergrationRepository")
 */
class Intergration
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
     * @ORM\Column(name="Responsable", type="string", length=255, nullable=true)
     */
    private $responsable;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="informations", type="string", length=255, nullable=true)
     */
    private $informations;

    /**
     * @var string
     *
     * @ORM\Column(name="pointfaible", type="string", length=255, nullable=true)
     */
    private $pointfaible;
    /**
     * @var string
     *
     * @ORM\Column(name="pointforte", type="string", length=255, nullable=true)
     */
    private $pointforte;

    /**
     * @ORM\OneToOne(targetEntity="Employee",inversedBy="intergation" )
     * @ORM\JoinColumn(name="employe_id" ,referencedColumnName="id")
     */
    private $employe;





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
     * Set responsable
     *
     * @param string $responsable
     * @return Intergration
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Intergration
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
     * @return Intergration
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
     * @return Intergration
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
     * Set informations
     *
     * @param string $informations
     * @return Intergration
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;

        return $this;
    }

    /**
     * Get informations
     *
     * @return string
     */
    public function getInformations()
    {
        return $this->informations;
    }

    /**
     * Set pointfaible
     *
     * @param string $pointfaible
     * @return Intergration
     */
    public function setPointfaible($pointfaible)
    {
        $this->pointfaible = $pointfaible;

        return $this;
    }

    /**
     * Get pointfaible
     *
     * @return string
     */
    public function getPointfaible()
    {
        return $this->pointfaible;
    }

    /**
     * Set pointforte
     *
     * @param string $pointforte
     * @return Intergration
     */
    public function setPointforte($pointforte)
    {
        $this->pointforte = $pointforte;

        return $this;
    }

    /**
     * Get pointforte
     *
     * @return string
     */
    public function getPointforte()
    {
        return $this->pointforte;
    }

    /**
     * Set employe
     *
     * @param \GestionBundle\Entity\Employee $employe
     * @return Intergration
     */
    public function setEmploye(\GestionBundle\Entity\Employee $employe = null)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return \GestionBundle\Entity\Employee
     */
    public function getEmploye()
    {
        return $this->employe;
    }
}
