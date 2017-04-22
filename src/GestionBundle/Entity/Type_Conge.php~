<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_Conge
 *
 * @ORM\Table(name="type__conge")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\Type_CongeRepository")
 */
class Type_Conge
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
     * @ORM\Column(name="Libelle_Type", type="string", length=30)
     */
    private $libelleType;

    /**
     *  @ORM\OneToMany(targetEntity="DemandeConge", mappedBy="typeconge",cascade={"persist"})
     */
    private $demandeconges;

      public function __toString() {
        return $this->libelleType;
    }

  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->demandeconges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleType
     *
     * @param string $libelleType
     * @return Type_Conge
     */
    public function setLibelleType($libelleType)
    {
        $this->libelleType = $libelleType;

        return $this;
    }

    /**
     * Get libelleType
     *
     * @return string 
     */
    public function getLibelleType()
    {
        return $this->libelleType;
    }

    /**
     * Add demandeconges
     *
     * @param \GestionBundle\Entity\DemandeConge $demandeconges
     * @return Type_Conge
     */
    public function addDemandeconge(\GestionBundle\Entity\DemandeConge $demandeconges)
    {
        $this->demandeconges[] = $demandeconges;

        return $this;
    }

    /**
     * Remove demandeconges
     *
     * @param \GestionBundle\Entity\DemandeConge $demandeconges
     */
    public function removeDemandeconge(\GestionBundle\Entity\DemandeConge $demandeconges)
    {
        $this->demandeconges->removeElement($demandeconges);
    }

    /**
     * Get demandeconges
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDemandeconges()
    {
        return $this->demandeconges;
    }
}
