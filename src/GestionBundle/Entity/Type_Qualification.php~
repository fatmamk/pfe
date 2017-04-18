<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_Qualification
 *
 * @ORM\Table(name="type__qualification")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\Type_QualificationRepository")
 */
class Type_Qualification
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
     * @ORM\Column(name="Libelle_TypeQ", type="string", length=30)
     */
    private $libelleTypeQ;
    
    /**
     
     * @ORM\OneToMany(targetEntity="Qualification", mappedBy="type_qual" ,cascade={"remove"})
     */
    private $qualifications;

    

  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->qualifications = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelleTypeQ
     *
     * @param string $libelleTypeQ
     * @return Type_Qualification
     */
    public function setLibelleTypeQ($libelleTypeQ)
    {
        $this->libelleTypeQ = $libelleTypeQ;

        return $this;
    }

    /**
     * Get libelleTypeQ
     *
     * @return string 
     */
    public function getLibelleTypeQ()
    {
        return $this->libelleTypeQ;
    }

    /**
     * Add qualifications
     *
     * @param \GestionBundle\Entity\Qualification $qualifications
     * @return Type_Qualification
     */
    public function addQualification(\GestionBundle\Entity\Qualification $qualifications)
    {
        $this->qualifications[] = $qualifications;

        return $this;
    }

    /**
     * Remove qualifications
     *
     * @param \GestionBundle\Entity\Qualification $qualifications
     */
    public function removeQualification(\GestionBundle\Entity\Qualification $qualifications)
    {
        $this->qualifications->removeElement($qualifications);
    }

    /**
     * Get qualifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQualifications()
    {
        return $this->qualifications;
    }


    public  function _toString()
    {
        return $this->libelleTypeQ;
    }
}
