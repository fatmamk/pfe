<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeConge
 *
 * @ORM\Table(name="demande_conge")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\DemandeCongeRepository")
 */
class DemandeConge
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
     * @ORM\Column(name="StatutsConge", type="string", length=255, nullable=true)
     */
    private $statutsConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut_Conge", type="date")
     */
    private $dateDebutConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin_Conge", type="date")
     */
    private $dateFinConge;

    /**
     *@ORM\ManyToOne(targetEntity="Type_Conge",inversedBy="demandeconges" ,cascade={"persist"})
     *@ORM\JoinColumn(name="type_id" ,referencedColumnName="id")
     */
    private $typeconge;

    /**
     *@ORM\ManyToOne(targetEntity="Employee",inversedBy="demandeConge" ,cascade={"persist"})
     *@ORM\JoinColumn(name="employe_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $employe;



    public function __toString()
    {
        return $this->statutsConge;
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
     * Set statutsConge
     *
     * @param string $statutsConge
     * @return DemandeConge
     */
    public function setStatutsConge($statutsConge)
    {
        $this->statutsConge = $statutsConge;

        return $this;
    }

    /**
     * Get statutsConge
     *
     * @return string 
     */
    public function getStatutsConge()
    {
        return $this->statutsConge;
    }

    /**
     * Set dateDebutConge
     *
     * @param \DateTime $dateDebutConge
     * @return DemandeConge
     */
    public function setDateDebutConge($dateDebutConge)
    {
        $this->dateDebutConge = $dateDebutConge;

        return $this;
    }

    /**
     * Get dateDebutConge
     *
     * @return \DateTime 
     */
    public function getDateDebutConge()
    {
        return $this->dateDebutConge;
    }

    /**
     * Set dateFinConge
     *
     * @param \DateTime $dateFinConge
     * @return DemandeConge
     */
    public function setDateFinConge($dateFinConge)
    {
        $this->dateFinConge = $dateFinConge;

        return $this;
    }

    /**
     * Get dateFinConge
     *
     * @return \DateTime 
     */
    public function getDateFinConge()
    {
        return $this->dateFinConge;
    }

    /**
     * Set typeconge
     *
     * @param \GestionBundle\Entity\Type_Conge $typeconge
     * @return DemandeConge
     */
    public function setTypeconge(\GestionBundle\Entity\Type_Conge $typeconge = null)
    {
        $this->typeconge = $typeconge;

        return $this;
    }

    /**
     * Get typeconge
     *
     * @return \GestionBundle\Entity\Type_Conge 
     */
    public function getTypeconge()
    {
        return $this->typeconge;
    }

    /**
     * Set employe
     *
     * @param \GestionBundle\Entity\Employee $employe
     * @return DemandeConge
     */
    public function setEmploye(\GestionBundle\Entity\Employee $employe = null)
    {
        $this->employe = $employe;

        return $this;
    }

    /**
     * Get employe
     *
     * @return \GestionBundle\Entity\Employee 
     */
    public function getEmploye()
    {
        return $this->employe;
    }
}
