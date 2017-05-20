<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @ORM\Column(name="Libelle_Carriere", type="string", length=20,nullable=true)
     */
    private $libelleCarriere;
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=20,nullable=true)
     */
    private $etat;
    /**
     * @var string
     *
     * @ORM\Column(name="Type_Contrat", type="string",nullable=true)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="Integre", type="boolean")
     */
    private $integre;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Recrutement", type="date",nullable=true)
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
     * @ORM\OneToOne(targetEntity="Employee" ,mappedBy="carriere",cascade={"persist"})
     *@ORM\JoinColumn(name="employeeCarriere_id" ,referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
      private $employee;

    /**
     * @var string
     *
     * @ORM\Column(name="Fichier_Contrat", type="string", length=255,nullable=true)
     */
    private $fichierContrat;
    
    private $file;

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function __toString() {
        return $this->libelleCarriere;
    }

    public function getUploadDir()
    {
        return 'upload/files';
    }
    public function getAbsolutRoot()
    {
        return   $this->getUploadRoot().$this->fichierContrat;
    }

    public function getWebPath()
    {
        return   $this->getUploadDir().'/'.$this->fichierContrat;
    }

    public function getUploadRoot()
    {
        return   __DIR__.'/../../../web/'.$this->getUploadDir().'/'.$this->fichierContrat;
    }

    public function upload()
    {
        if($this->file==null)
        {
            return;
        }
        $this->fichierContrat=$this->file->getClientOriginalName();

        if(!is_dir($this->getUploadRoot()))
        {
            mkdir($this->getUploadRoot(),'0777',true);
        }
        $this->file->move($this->getUploadRoot(),$this->fichierContrat);
        unset($this->file);
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
     * Set etat
     *
     * @param string $etat
     * @return Carriere
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
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
     * @param boolean $integre
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
     * @return boolean 
     */
    public function getIntegre()
    {
        return $this->integre;
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
