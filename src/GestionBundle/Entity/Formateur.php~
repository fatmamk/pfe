<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Formateur
 *
 * @ORM\Table(name="formateur")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\FormateurRepository")
 */
class Formateur
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
 * @var string
 *
 * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
 */
    private $prenom;

 
    /**
     * @var string
     *
     * @ORM\Column(name="cv", type="string", length=255, nullable=true)
     */
    private $cv;

 /**
     * @ORM\OneToMany(targetEntity="Formation", mappedBy="formateur" ,cascade={"persist"})
     *
     */
    private $formation;
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
     * Set nom
     *
     * @param string $nom
     * @return Formateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Formateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return Formateur
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Formateur
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
    public  function toString()
    {
        return ($this->getNom() . ' ' . $this->getPrenom());
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Formateur
     */
    public function addFormation(\GestionBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     */
    public function removeFormation(\GestionBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    public function getUploadDir()
    {
        return 'upload/files';
    }
    public function getAbsolutRoot()
    {
        return   __DIR__.'../../web'.$this->getUploadRoot().'/'.$this->cv;
    }

    public function getWebPath()
    {
        return   $this->getUploadDir().'/'.$this->cv;
    }

    public function getUploadRoot()
    {
        return   __DIR__.'/../../../web/'.$this->getUploadDir().'/'.$this->cv;
    }


    public function upload()
    {
        if($this->file==null)
        {
            return;
        }
        $this->cv=$this->file->getClientOriginalName();

        if(!is_dir($this->getUploadRoot()))
        {
            mkdir($this->getUploadRoot(),'0777',true);
        }
        $this->file->move($this->getUploadRoot(),$this->cv);
        unset($this->file);
    }


}
