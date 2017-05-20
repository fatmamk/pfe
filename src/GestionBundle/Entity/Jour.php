<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jour
 *
 * @ORM\Table(name="jour")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\JourRepository")
 */
class Jour
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
     * @ORM\Column(name="progMedi", type="string", length=255, nullable=true)
     */
    private $progMedi;

    /**
     * @var string
     *
     * @ORM\Column(name="progmatin", type="string", length=255, nullable=true)
     */
    private $progmatin;




    public function __toString() {
        return $this->progMedi.' '.progmatin;
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
     * Set progMedi
     *
     * @param string $progMedi
     * @return Jour
     */
    public function setProgMedi($progMedi)
    {
        $this->progMedi = $progMedi;

        return $this;
    }

    /**
     * Get progMedi
     *
     * @return string
     */
    public function getProgMedi()
    {
        return $this->progMedi;
    }

    /**
     * Set progmatin
     *
     * @param string $progmatin
     * @return Jour
     */
    public function setProgmatin($progmatin)
    {
        $this->progmatin = $progmatin;

        return $this;
    }

    /**
     * Get progmatin
     *
     * @return string
     */
    public function getProgmatin()
    {
        return $this->progmatin;
    }

    /**
     * Set formations
     *
     * @param \GestionBundle\Entity\Formation $formations
     * @return Jour
     */
    public function setFormations(\GestionBundle\Entity\Formation $formations = null)
    {
        $this->formations = $formations;

        return $this;
    }

    /**
     * Get formations
     *
     * @return \GestionBundle\Entity\Formation
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Set formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Jour
     */
    public function setFormation(\GestionBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \GestionBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
