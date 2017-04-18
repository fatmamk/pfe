<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(name="Libelle_Srvice", type="string", length=30)
     */
    private $libelleSrvice;
     /**
     * @ORM\OneToMany(targetEntity="Employee",mappedBy="site");
     */
    private $employees;


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
     * Set libelleSrvice
     *
     * @param string $libelleSrvice
     * @return Service
     */
    public function setLibelleSrvice($libelleSrvice)
    {
        $this->libelleSrvice = $libelleSrvice;

        return $this;
    }

    /**
     * Get libelleSrvice
     *
     * @return string 
     */
    public function getLibelleSrvice()
    {
        return $this->libelleSrvice;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->employees = new \Doctrine\Common\Collections\ArrayCollection();
    }
  /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Service
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

    
    public function __toString() {
        return $this->getLibelleSrvice();
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
