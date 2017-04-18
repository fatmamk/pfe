<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualification
 *
 * @ORM\Table(name="qualification")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\QualificationRepository")
 */
class Qualification
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
     * @ORM\Column(name="Libelle_Qualif", type="string", length=30)
     */
    private $libelleQualif;


    /**
     * @ORM\ManyToOne(targetEntity="Type_Qualification", inversedBy="qualifications", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="TypeQualification_id", referencedColumnName="id", nullable=false)
     */
        private $type_qual;
    
  

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
     * Set libelleQualif
     *
     * @param string $libelleQualif
     * @return Qualification
     */
    public function setLibelleQualif($libelleQualif)
    {
        $this->libelleQualif = $libelleQualif;

        return $this;
    }

    /**
     * Get libelleQualif
     *
     * @return string 
     */
    public function getLibelleQualif()
    {
        return $this->libelleQualif;
    }

    /**
     * Set type_qual
     *
     * @param \GestionBundle\Entity\Type_Qualification $typeQual
     * @return Qualification
     */
    public function setTypeQual(\GestionBundle\Entity\Type_Qualification $typeQual)
    {
        $this->type_qual = $typeQual;

        return $this;
    }

    /**
     * Get type_qual
     *
     * @return \GestionBundle\Entity\Type_Qualification 
     */
    public function getTypeQual()
    {
        return $this->type_qual;
    }
}
