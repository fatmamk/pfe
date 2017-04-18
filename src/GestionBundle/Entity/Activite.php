<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ActiviteRepository")
 */
class Activite
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
     * @ORM\Column(name="Libelle_Activite", type="string", length=30)
     */
    private $libelleActivite;

    /**
     * @var string
     *
     * @ORM\Column(name="Abreviation_Activite", type="string", length=30)
     */
    private $abreviationActivite;

    /**
     *  @ORM\ManyToMany(targetEntity="Employee", mappedBy="activites")
     */
    private $employees;
   


    public function __toString() {
        return $this->libelleActivite;}

    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleActivite
     *
     * @param string $libelleActivite
     * @return Activite
     */
    public function setLibelleActivite($libelleActivite)
    {
        $this->libelleActivite = $libelleActivite;

        return $this;
    }

    /**
     * Get libelleActivite
     *
     * @return string 
     */
    public function getLibelleActivite()
    {
        return $this->libelleActivite;
    }

    /**
     * Set abreviationActivite
     *
     * @param string $abreviationActivite
     * @return Activite
     */
    public function setAbreviationActivite($abreviationActivite)
    {
        $this->abreviationActivite = $abreviationActivite;

        return $this;
    }

    /**
     * Get abreviationActivite
     *
     * @return string 
     */
    public function getAbreviationActivite()
    {
        return $this->abreviationActivite;
    }

    /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Activite
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
}
