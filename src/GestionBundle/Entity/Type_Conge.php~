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
     *  @ORM\OneToMany(targetEntity="Conge", mappedBy="typeconge",cascade={"persist"})
     */
    private $conges;

      public function __toString() {
        return $this->libelleType;
    }

      /**
     * Constructor
     */
    public function __construct()
    {
        $this->conges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add conges
     *
     * @param \GestionBundle\Entity\Conge $conges
     * @return Type_Conge
     */
    public function addConge(\GestionBundle\Entity\Conge $conges)
    {
        $this->conges[] = $conges;

        return $this;
    }

    /**
     * Remove conges
     *
     * @param \GestionBundle\Entity\Conge $conges
     */
    public function removeConge(\GestionBundle\Entity\Conge $conges)
    {
        $this->conges->removeElement($conges);
    }
    /**
     * Get conges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConges()
    {
        return $this->conges;
    }
}
