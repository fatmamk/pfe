<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fonction
 *
 * @ORM\Table(name="fonction")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\FonctionRepository")
 */
class Fonction
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
     * @ORM\Column(name="Libelle_Fonction", type="string", length=20)
     */
    private $libelleFonction;


    /**
     *  @ORM\OneToMany(targetEntity="Employee", mappedBy="fonctions",cascade={"persist"})
     */
    private $employees;




    public function __toString() {
        return $this->libelleFonction;
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
     * Set libelleFonction
     *
     * @param string $libelleFonction
     * @return Fonction
     */
    public function setLibelleFonction($libelleFonction)
    {
        $this->libelleFonction = $libelleFonction;

        return $this;
    }

    /**
     * Get libelleFonction
     *
     * @return string 
     */
    public function getLibelleFonction()
    {
        return $this->libelleFonction;
    }

    /**
     * Add employees
     *
     * @param \GestionBundle\Entity\Employee $employees
     * @return Fonction
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
