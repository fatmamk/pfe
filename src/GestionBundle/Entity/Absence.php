<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Absence
 *
 * @ORM\Table(name="absence")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\AbsenceRepository")
 */
class Absence
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
     * @ORM\Column(name="Justifier", type="boolean",nullable=true)
     */
    private $justifier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;


    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="Employee",inversedBy="absences")
     * @ORM\JoinColumn(name="employee_id" ,referencedColumnName="id")
     */
    private $employee;



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
     * Set justifier
     *
     * @param boolean $justifier
     * @return Absence
     */
    public function setJustifier($justifier)
    {
        $this->justifier = $justifier;

        return $this;
    }

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

    /**
     * Get justifier
     *
     * @return boolean 
     */
    public function getJustifier()
    {
        return $this->justifier;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Absence
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Absence
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Absence
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set employee
     *
     * @param \GestionBundle\Entity\Employee $employee
     * @return Absence
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

    public function getUploadDir()
    {
        return 'upload/files';
    }
    public function getAbsolutRoot()
    {
        return   $this->getUploadRoot().$this->name;
    }

    public function getWebPath()
    {
        return   $this->getUploadDir().'/'.$this->name;
    }

    public function getUploadRoot()
    {
        return   __DIR__.'/../../../web/'.$this->getUploadDir().'/'.$this->name;
    }


    public function upload()
    {
        if($this->file==null)
        {
            return;
        }
        $this->name=$this->file->getClientOriginalName();

        if(!is_dir($this->getUploadRoot()))
        {
            mkdir($this->getUploadRoot(),'0777',true);
        }
        $this->file->move($this->getUploadRoot(),$this->name);
        unset($this->file);
    }
}
