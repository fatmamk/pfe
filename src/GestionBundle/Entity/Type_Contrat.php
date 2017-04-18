<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_Contrat
 *
 * @ORM\Table(name="type__contrat")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\Type_ContratRepository")
 */
class Type_Contrat
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
     * @ORM\Column(name="Libelle_TypeC", type="string", length=30)
     */
    private $libelleTypeC;

    /**
     *  @ORM\OneToMany(targetEntity="Carriere", mappedBy="typecontrar",cascade={"persist"})
     */
    private $carrieres;

    


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carrieres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleTypeC
     *
     * @param string $libelleTypeC
     * @return Type_Contrat
     */
    public function setLibelleTypeC($libelleTypeC)
    {
        $this->libelleTypeC = $libelleTypeC;

        return $this;
    }

    /**
     * Get libelleTypeC
     *
     * @return string 
     */
    public function getLibelleTypeC()
    {
        return $this->libelleTypeC;
    }

    /**
     * Add carrieres
     *
     * @param \GestionBundle\Entity\Carriere $carrieres
     * @return Type_Contrat
     */
    public function addCarriere(\GestionBundle\Entity\Carriere $carrieres)
    {
        $this->carrieres[] = $carrieres;

        return $this;
    }

    /**
     * Remove carrieres
     *
     * @param \GestionBundle\Entity\Carriere $carrieres
     */
    public function removeCarriere(\GestionBundle\Entity\Carriere $carrieres)
    {
        $this->carrieres->removeElement($carrieres);
    }

    /**
     * Get carrieres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCarrieres()
    {
        return $this->carrieres;
    }

    public function _toString()
    {
        return $this->libelleTypeC;
    }
}
