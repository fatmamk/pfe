<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NatureAbsence
 *
 * @ORM\Table(name="nature_absence")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\NatureAbsenceRepository")
 */
class NatureAbsence
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
     * @ORM\Column(name="Libelle_Nature", type="string", length=30)
     */
    private $libelleNature;


    /**
     *  @ORM\OneToMany(targetEntity="Absence", mappedBy="nature",cascade={"persist"})
     */
    private $nature_absences;



    
    public function _toString()
    {
        return $this->libelleNature;
    }
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nature_absences = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleNature
     *
     * @param string $libelleNature
     * @return NatureAbsence
     */
    public function setLibelleNature($libelleNature)
    {
        $this->libelleNature = $libelleNature;

        return $this;
    }

    /**
     * Get libelleNature
     *
     * @return string 
     */
    public function getLibelleNature()
    {
        return $this->libelleNature;
    }

    /**
     * Add nature_absences
     *
     * @param \GestionBundle\Entity\Absence $natureAbsences
     * @return NatureAbsence
     */
    public function addNatureAbsence(\GestionBundle\Entity\Absence $natureAbsences)
    {
        $this->nature_absences[] = $natureAbsences;

        return $this;
    }

    /**
     * Remove nature_absences
     *
     * @param \GestionBundle\Entity\Absence $natureAbsences
     */
    public function removeNatureAbsence(\GestionBundle\Entity\Absence $natureAbsences)
    {
        $this->nature_absences->removeElement($natureAbsences);
    }

    /**
     * Get nature_absences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNatureAbsences()
    {
        return $this->nature_absences;
    }
}
