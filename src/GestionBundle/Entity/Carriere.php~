<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carriere
 *
 * @ORM\Table(name="carriere")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\CarriereRepository")
 */
class Carriere
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
     * @ORM\Column(name="Libelle_Carriere", type="string", length=20)
     */
    private $libelleCarriere;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Contrat", type="string", length=30)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="Integre", type="string", length=30)
     */
    private $integre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Debut_Intergration", type="date")
     */
    private $debutIntergration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fin_Integration", type="date")
     */
    private $finIntegration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Recrutement", type="date")
     */
    private $dateRecrutement;
    
    //*********Type Carrier****************
     /**
     * @ORM\ManyToOne(targetEntity="Type_Contrat", inversedBy="carrieres")
     * @ORM\JoinColumn(name="typeContrat_id" , referencedColumnName="id")
     */

       private $typecontrar;
      
     //***********Employee**********
    /**
     * @ORM\OneToOne(targetEntity="Employee" ,mappedBy="carriere")

     */
      private $employee;

    /**
     * @var string
     *
     * @ORM\Column(name="Fichier_Contrat", type="string", length=30)
     */
    private $fichierContrat;





    public function __toString() {
        return $this->libelleCarriere;}

   

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
     * Set libelleCarriere
     *
     * @param string $libelleCarriere
     * @return Carriere
     */
    public function setLibelleCarriere($libelleCarriere)
    {
        $this->libelleCarriere = $libelleCarriere;

        return $this;
    }

    /**
     * Get libelleCarriere
     *
     * @return string 
     */
    public function getLibelleCarriere()
    {
        return $this->libelleCarriere;
    }

    /**
     * Set typeContrat
     *
     * @param string $typeContrat
     * @return Carriere
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    /**
     * Get typeContrat
     *
     * @return string 
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * Set integre
     *
     * @param string $integre
     * @return Carriere
     */
    public function setIntegre($integre)
    {
        $this->integre = $integre;

        return $this;
    }

    /**
     * Get integre
     *
     * @return string 
     */
    public function getIntegre()
    {
        return $this->integre;
    }

    /**
     * Set debutIntergration
     *
     * @param \DateTime $debutIntergration
     * @return Carriere
     */
    public function setDebutIntergration($debutIntergration)
    {
        $this->debutIntergration = $debutIntergration;

        return $this;
    }

    /**
     * Get debutIntergration
     *
     * @return \DateTime 
     */
    public function getDebutIntergration()
    {
        return $this->debutIntergration;
    }

    /**
     * Set finIntegration
     *
     * @param \DateTime $finIntegration
     * @return Carriere
     */
    public function setFinIntegration($finIntegration)
    {
        $this->finIntegration = $finIntegration;

        return $this;
    }

    /**
     * Get finIntegration
     *
     * @return \DateTime 
     */
    public function getFinIntegration()
    {
        return $this->finIntegration;
    }

    /**
     * Set dateRecrutement
     *
     * @param \DateTime $dateRecrutement
     * @return Carriere
     */
    public function setDateRecrutement($dateRecrutement)
    {
        $this->dateRecrutement = $dateRecrutement;

        return $this;
    }

    /**
     * Get dateRecrutement
     *
     * @return \DateTime 
     */
    public function getDateRecrutement()
    {
        return $this->dateRecrutement;
    }

    /**
     * Set fichierContrat
     *
     * @param string $fichierContrat
     * @return Carriere
     */
    public function setFichierContrat($fichierContrat)
    {
        $this->fichierContrat = $fichierContrat;

        return $this;
    }

    /**
     * Get fichierContrat
     *
     * @return string 
     */
    public function getFichierContrat()
    {
        return $this->fichierContrat;
    }

    /**
     * Set typecontrar
     *
     * @param \GestionBundle\Entity\Type_Contrat $typecontrar
     * @return Carriere
     */
    public function setTypecontrar(\GestionBundle\Entity\Type_Contrat $typecontrar = null)
    {
        $this->typecontrar = $typecontrar;

        return $this;
    }

    /**
     * Get typecontrar
     *
     * @return \GestionBundle\Entity\Type_Contrat 
     */
    public function getTypecontrar()
    {
        return $this->typecontrar;
    }

    /**
     * Set employee
     *
     * @param \GestionBundle\Entity\Employee $employee
     * @return Carriere
     */
    public function setEmployee(\GestionBundle\Entity\Employee $employee = null)
    {
        $this->employee = $employee;

        return $this;
    }

    /**
     * Get employee
     *
     * @return \GestionBundle\Entity\Employee 
     */
    public function getEmployee()
    {
        return $this->employee;
    }
}
