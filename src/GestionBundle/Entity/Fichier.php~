<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Fichier
 *
 * @ORM\Table(name="fichier")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\FichierRepository")
 */
class Fichier
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
     * @ORM\Column(name="nomfichier", type="string", length=255)
     */
    private $nomfichier;

    /**
     * @var string
     *
     * @ORM\Column(name="natureFichier", type="string", length=255)
     */
    private $natureFichier;
    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;




    /**
     * @var string
     *
     * @ORM\Column(name="fichierJoins", type="string", length=255)
     */
    private $fichierJoins;
     private $file;

    /**
     *@ORM\ManyToOne(targetEntity="Formation",inversedBy="formation" ,cascade={"persist"})
     *@ORM\JoinColumn(name="fichiers_id" ,referencedColumnName="id")
     */
    private $fichiers;



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
    public function setFile( UploadedFile $file)
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

    public function getUploadDir()
    {
            return 'upload/files';
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
     * Set nomfichier
     *
     * @param string $nomfichier
     * @return Fichier
     */
    public function setNomfichier($nomfichier)
    {
        $this->nomfichier = $nomfichier;

        return $this;
    }

    /**
     * Get nomfichier
     *
     * @return string 
     */
    public function getNomfichier()
    {
        return $this->nomfichier;
    }

    /**
     * Set natureFichier
     *
     * @param string $natureFichier
     * @return Fichier
     */
    public function setNatureFichier($natureFichier)
    {
        $this->natureFichier = $natureFichier;

        return $this;
    }

    /**
     * Get natureFichier
     *
     * @return string 
     */
    public function getNatureFichier()
    {
        return $this->natureFichier;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Fichier
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set fichierJoins
     *
     * @param string $fichierJoins
     * @return Fichier
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

    /**
     * Set fichiers
     *
     * @param \GestionBundle\Entity\Formation $fichiers
     * @return Fichier
     */
    public function setFichiers(\GestionBundle\Entity\Formation $fichiers = null)
    {
        $this->fichiers = $fichiers;

        return $this;
    }

    /**
     * Get fichiers
     *
     * @return \GestionBundle\Entity\Formation 
     */
    public function getFichiers()
    {
        return $this->fichiers;
    }
}
