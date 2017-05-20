<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table(name="poste")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\PosteRepository")
 */
class Poste
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
     * @ORM\Column(name="libellePoste", type="string", length=255, nullable=true)
     */
    private $libellePoste;
    
    /**
     * @ORM\ManyToMany(targetEntity="Fonction", mappedBy="postes")
     *
     */
    private $formations;

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
     * Set libellePoste
     *
     * @param string $libellePoste
     * @return Poste
     */
    public function setLibellePoste($libellePoste)
    {
        $this->libellePoste = $libellePoste;

        return $this;
    }

    /**
     * Get libellePoste
     *
     * @return string 
     */
    public function getLibellePoste()
    {
        return $this->libellePoste;
    }

    /**
     * Add formations
     *
     * @param \GestionBundle\Entity\Fonction $formations
     * @return Poste
     */
    public function addFormation(\GestionBundle\Entity\Fonction $formations)
    {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \GestionBundle\Entity\Fonction $formations
     */
    public function removeFormation(\GestionBundle\Entity\Fonction $formations)
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
    public function __toString()
    {
        return (String)$this->libellePoste;
    }
}
