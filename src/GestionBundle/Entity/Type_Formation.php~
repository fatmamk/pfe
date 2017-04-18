<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_Formation
 *
 * @ORM\Table(name="type__formation")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\Type_FormationRepository")
 */
class Type_Formation
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
     * @ORM\Column(name="Libelle_TypeF", type="string", length=30)
     */
    private $libelleTypeF;

    /**
     *  @ORM\OneToMany(targetEntity="Formation", mappedBy="typeFormation",cascade={"remove"}, orphanRemoval=true)
     */
    private $formations;



    
    
    public function __toString() {
        return $this->libelleTypeF;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleTypeF
     *
     * @param string $libelleTypeF
     * @return Type_Formation
     */
    public function setLibelleTypeF($libelleTypeF)
    {
        $this->libelleTypeF = $libelleTypeF;

        return $this;
    }

    /**
     * Get libelleTypeF
     *
     * @return string 
     */
    public function getLibelleTypeF()
    {
        return $this->libelleTypeF;
    }

    /**
     * Add formations
     *
     * @param \GestionBundle\Entity\Formation $formations
     * @return Type_Formation
     */
    public function addFormation(\GestionBundle\Entity\Formation $formations)
    {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \GestionBundle\Entity\Formation $formations
     */
    public function removeFormation(\GestionBundle\Entity\Formation $formations)
    {
        $this->formations->removeElement($formations);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormations()
    {
        return $this->formations;
    }
}
