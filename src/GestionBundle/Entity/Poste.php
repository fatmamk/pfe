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
     */
    private $fonctions;
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
     * Set fonction
     *
     * @param \GestionBundle\Entity\Fonction $fonction
     * @return Poste
     */
    public function setFonction(\GestionBundle\Entity\Fonction $fonction = null)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return \GestionBundle\Entity\Fonction 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    public function __toString()
    {
        return $this->libellePoste;
    }
    public function toString()

{
    return $this->libellePoste;
}

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fonctions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fonctions
     *
     * @param \GestionBundle\Entity\Fonction $fonctions
     * @return Poste
     */
    public function addFonction(\GestionBundle\Entity\Fonction $fonctions)
    {
        $this->fonctions[] = $fonctions;

        return $this;
    }

    /**
     * Remove fonctions
     *
     * @param \GestionBundle\Entity\Fonction $fonctions
     */
    public function removeFonction(\GestionBundle\Entity\Fonction $fonctions)
    {
        $this->fonctions->removeElement($fonctions);
    }

    /**
     * Get fonctions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFonctions()
    {
        return $this->fonctions;
    }

    /**
     * Add postes
     *
     * @param \GestionBundle\Entity\Poste $postes
     * @return Poste
     */
    public function addPoste(\GestionBundle\Entity\Poste $postes)
    {
        $this->postes[] = $postes;

        return $this;
    }

    /**
     * Remove postes
     *
     * @param \GestionBundle\Entity\Poste $postes
     */
    public function removePoste(\GestionBundle\Entity\Poste $postes)
    {
        $this->postes->removeElement($postes);
    }

    /**
     * Get postes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostes()
    {
        return $this->postes;
    }
}
