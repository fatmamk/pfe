<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity
 * @ORM\Table(name="document")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\DocumentRepository")
 */
class Document
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    public $fichierJoins;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $path;

    /**
     * @ORM\ManyToOne(targetEntity="Formation",inversedBy="documents")
     * @ORM\JoinColumn(name="formation_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $formation;


    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile( UploadedFile $file)
    {
        $this->file = $file;
    }




    public function getUploadDir()
    {
        return 'upload/documents';
    }
    public function getAbsolutRoot()
    {
        return   $this->getUploadRoot().$this->fichierJoins;
    }

    public function getWebPath()
    {
        return   $this->getUploadDir().'/'.$this->fichierJoins;
    }

    public function getUploadRoot()
    {
        return   __DIR__.'/../../../web/'.$this->getUploadDir().'/'.$this->fichierJoins;
    }


    public function upload()
    {
        if($this->file==null)
        {
            return;
        }
        $this->fichierJoins=$this->file->getClientOriginalName();

        if(!is_dir($this->getUploadRoot()))
        {
            mkdir($this->getUploadRoot(),'0777',true);
        }
        $this->file->move($this->getUploadRoot(),$this->fichierJoins);
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
     * Set name
     *
     * @param string $name
     *
     * @return Document
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
     * Set path
     *
     * @param string $path
     *
     * @return Document
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set formation
     *
     * @param \GestionBundle\Entity\Formation $formation
     * @return Document
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

    /**
     * Set fichierJoins
     *
     * @param string $fichierJoins
     * @return Document
     */
    public function setFichierJoins($fichierJoins)
    {
        $this->fichierJoins = $fichierJoins;

        return $this;
    }

    /**
     * Get fichierJoins
     *
     * @return string 
     */
    public function getFichierJoins()
    {
        return $this->fichierJoins;
    }
}
