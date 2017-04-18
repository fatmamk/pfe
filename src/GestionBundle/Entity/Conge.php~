<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conge
 *
 * @ORM\Table(name="conge")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\CongeRepository")
 */
class Conge
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
     * @ORM\Column(name="Statuts_Conge", type="string", length=30)
     */
    private $statutsConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut_Conge", type="date")
     */
    private $dateDebutConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin_Conge", type="date")
     */
    private $dateFinConge;

    /**
     *@ORM\ManyToOne(targetEntity="Type_Conge",inversedBy="conges" ,cascade={"persist"})
     *@ORM\JoinColumn(name="type_id" ,referencedColumnName="id")
     */
    private $typeconge;

    /**
     *@ORM\ManyToOne(targetEntity="Employee",inversedBy="conges" ,cascade={"persist"})
     *@ORM\JoinColumn(name="employee_id" ,referencedColumnName="id")
     */
    private $employee;


    public function __toString()
    {
        return $this->typeconge;
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
     * Set statutsConge
     *
     * @param string $statutsConge
     * @return Conge
     */
    public function setStatutsConge($statutsConge)
    {
        $this->statutsConge = $statutsConge;

        return $this;
    }

    /**
     * Get statutsConge
     *
     * @return string 
     */
    public function getStatutsConge()
    {
        return $this->statutsConge;
    }

    /**
     * Set dateDebutConge
     *
     * @param \DateTime $dateDebutConge
     * @return Conge
     */
    public function setDateDebutConge($dateDebutConge)
    {
        $this->dateDebutConge = $dateDebutConge;

        return $this;
    }

    /**
     * Get dateDebutConge
     *
     * @return \DateTime 
     */
    public function getDateDebutConge()
    {
        return $this->dateDebutConge;
    }

    /**
     * Set dateFinConge
     *
     * @param \DateTime $dateFinConge
     * @return Conge
     */
    public function setDateFinConge($dateFinConge)
    {
        $this->dateFinConge = $dateFinConge;

        return $this;
    }

    /**
     * Get dateFinConge
     *
     * @return \DateTime 
     */
    public function getDateFinConge()
    {
        return $this->dateFinConge;
    }

    /**
     * Set typeconge
     *
     * @param \GestionBundle\Entity\Type_Conge $typeconge
     * @return Conge
     */
    public function setTypeconge(\GestionBundle\Entity\Type_Conge $typeconge = null)
    {
        $this->typeconge = $typeconge;

        return $this;
    }

    /**
     * Get typeconge
     *
     * @return \GestionBundle\Entity\Type_Conge 
     */
    public function getTypeconge()
    {
        return $this->typeconge;
    }

    /**
     * Set employee
     *
     * @param \GestionBundle\Entity\Employee $employee
     * @return Conge
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
