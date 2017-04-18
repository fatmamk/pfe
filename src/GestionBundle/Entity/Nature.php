<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nature
 *
 * @ORM\Table(name="nature")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\NatureRepository")
 */
class Nature
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
     * @var bool
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     *@ORM\OneToMany(targetEntity="Formation", mappedBy="formation",cascade={"remove"}, orphanRemoval=true)
     */
    private $nature;




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
     * Set libelle
     *
     * @param boolean $libelle
     * @return Nature
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return boolean 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set nature
     *
     * @param \GestionBundle\Entity\Formation $nature
     * @return Nature
     */
    public function setNature(\GestionBundle\Entity\Formation $nature = null)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return \GestionBundle\Entity\Formation 
     */
    public function getNature()
    {
        return $this->nature;
    }

    public  function _toString()
    {
        return $this->libelle;
    }
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nature = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add nature
     *
     * @param \GestionBundle\Entity\Formation $nature
     * @return Nature
     */
    public function addNature(\GestionBundle\Entity\Formation $nature)
    {
        $this->nature[] = $nature;

        return $this;
    }

    /**
     * Remove nature
     *
     * @param \GestionBundle\Entity\Formation $nature
     */
    public function removeNature(\GestionBundle\Entity\Formation $nature)
    {
        $this->nature->removeElement($nature);
    }
}
