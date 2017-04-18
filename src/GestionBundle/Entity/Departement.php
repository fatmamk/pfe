<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="libelleDepartement", type="string", length=50)
     */
    private $libelleDepartement;

    /**
     *  @ORM\OneToMany(targetEntity="Employee", mappedBy="departement",cascade={"persist"})
     */
    private $employees;


   

  
    public  function _toString()
    {
        return $this->libelleDepartement;
    }

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
     * Set libelleDepartement
     *
     * @param string $libelleDepartement
     * @return Departement
     */
    public function setLibelleDepartement($libelleDepartement)
    {
        $this->libelleDepartement = $libelleDepartement;

        return $this;
    }

    /**
     * Get libelleDepartement
     *
     * @return string 
     */
    public function getLibelleDepartement()
    {
        return $this->libelleDepartement;
    }

    /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Departement
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
