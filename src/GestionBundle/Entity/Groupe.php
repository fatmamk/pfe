<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\GroupeRepository")
 */
class Groupe
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
     * @ORM\Column(name="Libelle_Groupe", type="string", length=30)
     */
    private $libelleGroupe;

    /**
     *  @ORM\OneToMany(targetEntity="Employee", mappedBy="groupe",cascade={"persist"})
     */
    private $employees;


    public function __toString()
    {
        return $this->libelleGroupe;
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
     * Set libelleGroupe
     *
     * @param string $libelleGroupe
     * @return Groupe
     */
    public function setLibelleGroupe($libelleGroupe)
    {
        $this->libelleGroupe = $libelleGroupe;

        return $this;
    }

    /**
     * Get libelleGroupe
     *
     * @return string 
     */
    public function getLibelleGroupe()
    {
        return $this->libelleGroupe;
    }

    /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Groupe
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
