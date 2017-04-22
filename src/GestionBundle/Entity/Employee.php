<?php

namespace GestionBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;


/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\EmployeeRepository")
 */
class Employee
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
     * @ORM\Column(name="Nom", type="string", length=20,nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255,nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNaiss", type="date",nullable=true)
     */
    private $dateNaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="CIN_Employee", type="string", length=50,nullable=true)
     */
    private $cINEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexe", type="string", length=10,nullable=true)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_Employe", type="string", length=60,nullable=true)
     */
    private $adresseEmploye;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_Tel_Employee", type="string", length=20,nullable=true)
     */
    private $numTelEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="email_Employee", type="string", length=30)
     * @Assert\Email(
     *     message = "Le email '{{ value }}' N'est pas un email valide.",
     *     checkMX = false
     * )
     */
    
    private $emailEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Secondaire_Employee", type="string", length=30)
     * @Assert\Email(
     *     message = "Le email '{{ value }}' N'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $emailSecondaireEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="Matricule_Employee", type="string", length=20,nullable=true)
     */
    private $matriculeEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="Grade_Employee", type="string", length=30,nullable=true)
     */
    private $gradeEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="RIB_Employee", type="string", length=30,nullable=true)
     */
    private $rIBEmployee;

    /**
     * @var string
     *
     * @ORM\Column(name="Num_securite_Sociale_Employee", type="string", length=30,nullable=true)
     */
    private $numSecuriteSocialeEmployee;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=30,nullable=true)
     */
    private $type;
    /**
     * @var string
     *
     * @ORM\Column(name="Competance", type="string", length=30,nullable=true)
     */
    private $competance;

    /**
     * @var string
     *
     * @ORM\Column(name="Diplome", type="string", length=30,nullable=true)
     */
    private $diplome;
    /**
     * @var string
     *
     * @ORM\Column(name="lieunais", type="string", length=30,nullable=true)
     */
    private $lieunais;
    /**
     * @var string
     *
     * @ORM\Column(name="maison", type="string", length=30,nullable=true)
     */
    private $maison;
    /**
     * @var string
     *
     * @ORM\Column(name="gsm", type="string", length=30,nullable=true)
     */
    private $gsm;
    /**
     * @var string
     *
     * @ORM\Column(name="Experience", type="string", length=30,nullable=true)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="Aptitude_Physique", type="string", length=30,nullable=true)
     */
    private $aptitudePhysique;
    /**
     * @var string
     *
     * @ORM\Column(name="delivre_a", type="string", length=255, nullable=true)
     */
    private $delivreA;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @var /DateTime
     *
     * @ORM\Column(name="delivre_le", type="date", nullable=true)
     */
    private $delivreLe;

    /**
     * @ORM\ManyToOne(targetEntity="Groupe",inversedBy="employees", cascade={"persist"})
     * @ORM\JoinColumn(name="groupe_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $groupe;

    /**
     *@ORM\ManyToOne(targetEntity="Site",inversedBy="employees" ,cascade={"persist"})
     *@ORM\JoinColumn(name="site_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $site;



    /**
     *  @ORM\OneToMany(targetEntity="Absence", mappedBy="employee" , cascade={"remove"}, orphanRemoval=true)
     */
    private $absences;
    /**
     *@ORM\ManyToOne(targetEntity="Fonction",inversedBy="employees" ,cascade={"persist"})
     *@ORM\JoinColumn(name="fonctions_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */

    private $fonctions;


 
    /**
     *@ORM\ManyToOne(targetEntity="Departement",inversedBy="employees" ,cascade={"persist"})
     *@ORM\JoinColumn(name="departement_id" ,referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $departement;

    /**
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="employees")
     *
     */
    private $formations;
   



    /**
     * @ORM\OneToMany(targetEntity="Formation", mappedBy="formationsemployee")
     */

    private $employeeinterne;

    /**
     * @ORM\OneToOne(targetEntity="Carriere",inversedBy="employee" ,cascade={"persist"})
     * @ORM\JoinColumn(name="carriere_id" ,referencedColumnName="id",nullable=true, onDelete="SET NULL")
     */
    private $carriere;

    /**
     * @ORM\ManyToMany(targetEntity="Activite",inversedBy="employees" ,cascade={"persist"})
     * @ORM\JoinTable(name="activite_id" )
     */
    private $activites;

    /**
     * @ORM\OneToMany(targetEntity="Demande_Formation", mappedBy="employee" , cascade={"remove"}, orphanRemoval=true)
     */
    private $employeDemande;
    /**
     * @ORM\OneToMany(targetEntity="DemandeConge", mappedBy="employe" , cascade={"remove"}, orphanRemoval=true)
     */
    private $demandeConge;

    /**
     * * @ORM\OneToOne(targetEntity="Intergration" ,mappedBy="employe")
     */
    private $intergation;



    public function __toString()
    {
        return ($this->nom . ' ' . $this->prenom);
    }

    public function toString()
    {
        return ($this->nom . ' ' . $this->prenom);
    }

  
  
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->absences = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employeeinterne = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->employeDemande = new \Doctrine\Common\Collections\ArrayCollection();
        $this->demandeConge = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Employee
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
     * @return Employee
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
     * Set dateNaiss
     *
     * @param \DateTime $dateNaiss
     * @return Employee
     */
    public function setDateNaiss($dateNaiss)
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    /**
     * Get dateNaiss
     *
     * @return \DateTime 
     */
    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    /**
     * Set cINEmployee
     *
     * @param string $cINEmployee
     * @return Employee
     */
    public function setCINEmployee($cINEmployee)
    {
        $this->cINEmployee = $cINEmployee;

        return $this;
    }

    /**
     * Get cINEmployee
     *
     * @return string 
     */
    public function getCINEmployee()
    {
        return $this->cINEmployee;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Employee
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set adresseEmploye
     *
     * @param string $adresseEmploye
     * @return Employee
     */
    public function setAdresseEmploye($adresseEmploye)
    {
        $this->adresseEmploye = $adresseEmploye;

        return $this;
    }

    /**
     * Get adresseEmploye
     *
     * @return string 
     */
    public function getAdresseEmploye()
    {
        return $this->adresseEmploye;
    }

    /**
     * Set numTelEmployee
     *
     * @param string $numTelEmployee
     * @return Employee
     */
    public function setNumTelEmployee($numTelEmployee)
    {
        $this->numTelEmployee = $numTelEmployee;

        return $this;
    }

    /**
     * Get numTelEmployee
     *
     * @return string 
     */
    public function getNumTelEmployee()
    {
        return $this->numTelEmployee;
    }

    /**
     * Set emailEmployee
     *
     * @param string $emailEmployee
     * @return Employee
     */
    public function setEmailEmployee($emailEmployee)
    {
        $this->emailEmployee = $emailEmployee;

        return $this;
    }

    /**
     * Get emailEmployee
     *
     * @return string 
     */
    public function getEmailEmployee()
    {
        return $this->emailEmployee;
    }

    /**
     * Set emailSecondaireEmployee
     *
     * @param string $emailSecondaireEmployee
     * @return Employee
     */
    public function setEmailSecondaireEmployee($emailSecondaireEmployee)
    {
        $this->emailSecondaireEmployee = $emailSecondaireEmployee;

        return $this;
    }

    /**
     * Get emailSecondaireEmployee
     *
     * @return string 
     */
    public function getEmailSecondaireEmployee()
    {
        return $this->emailSecondaireEmployee;
    }

    /**
     * Set matriculeEmployee
     *
     * @param string $matriculeEmployee
     * @return Employee
     */
    public function setMatriculeEmployee($matriculeEmployee)
    {
        $this->matriculeEmployee = $matriculeEmployee;

        return $this;
    }

    /**
     * Get matriculeEmployee
     *
     * @return string 
     */
    public function getMatriculeEmployee()
    {
        return $this->matriculeEmployee;
    }

    /**
     * Set gradeEmployee
     *
     * @param string $gradeEmployee
     * @return Employee
     */
    public function setGradeEmployee($gradeEmployee)
    {
        $this->gradeEmployee = $gradeEmployee;

        return $this;
    }

    /**
     * Get gradeEmployee
     *
     * @return string 
     */
    public function getGradeEmployee()
    {
        return $this->gradeEmployee;
    }

    /**
     * Set rIBEmployee
     *
     * @param string $rIBEmployee
     * @return Employee
     */
    public function setRIBEmployee($rIBEmployee)
    {
        $this->rIBEmployee = $rIBEmployee;

        return $this;
    }

    /**
     * Get rIBEmployee
     *
     * @return string 
     */
    public function getRIBEmployee()
    {
        return $this->rIBEmployee;
    }

    /**
     * Set numSecuriteSocialeEmployee
     *
     * @param string $numSecuriteSocialeEmployee
     * @return Employee
     */
    public function setNumSecuriteSocialeEmployee($numSecuriteSocialeEmployee)
    {
        $this->numSecuriteSocialeEmployee = $numSecuriteSocialeEmployee;

        return $this;
    }

    /**
     * Get numSecuriteSocialeEmployee
     *
     * @return string 
     */
    public function getNumSecuriteSocialeEmployee()
    {
        return $this->numSecuriteSocialeEmployee;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Employee
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set competance
     *
     * @param string $competance
     * @return Employee
     */
    public function setCompetance($competance)
    {
        $this->competance = $competance;

        return $this;
    }

    /**
     * Get competance
     *
     * @return string 
     */
    public function getCompetance()
    {
        return $this->competance;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     * @return Employee
     */
    public function setDiplome($diplome)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string 
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return Employee
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set aptitudePhysique
     *
     * @param string $aptitudePhysique
     * @return Employee
     */
    public function setAptitudePhysique($aptitudePhysique)
    {
        $this->aptitudePhysique = $aptitudePhysique;

        return $this;
    }

    /**
     * Get aptitudePhysique
     *
     * @return string 
     */
    public function getAptitudePhysique()
    {
        return $this->aptitudePhysique;
    }

    /**
     * Set delivreA
     *
     * @param string $delivreA
     * @return Employee
     */
    public function setDelivreA($delivreA)
    {
        $this->delivreA = $delivreA;

        return $this;
    }

    /**
     * Get delivreA
     *
     * @return string 
     */
    public function getDelivreA()
    {
        return $this->delivreA;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     * @return Employee
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string 
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set delivreLe
     *
     * @param \DateTime $delivreLe
     * @return Employee
     */
    public function setDelivreLe($delivreLe)
    {
        $this->delivreLe = $delivreLe;

        return $this;
    }

    /**
     * Get delivreLe
     *
     * @return \DateTime 
     */
    public function getDelivreLe()
    {
        return $this->delivreLe;
    }

    /**
     * Set groupe
     *
     * @param \GestionBundle\Entity\Groupe $groupe
     * @return Employee
     */
    public function setGroupe(\GestionBundle\Entity\Groupe $groupe = null)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return \GestionBundle\Entity\Groupe 
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set site
     *
     * @param \GestionBundle\Entity\Site $site
     * @return Employee
     */
    public function setSite(\GestionBundle\Entity\Site $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \GestionBundle\Entity\Site 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Add absences
     *
     * @param \GestionBundle\Entity\Absence $absences
     * @return Employee
     */
    public function addAbsence(\GestionBundle\Entity\Absence $absences)
    {
        $this->absences[] = $absences;

        return $this;
    }

    /**
     * Remove absences
     *
     * @param \GestionBundle\Entity\Absence $absences
     */
    public function removeAbsence(\GestionBundle\Entity\Absence $absences)
    {
        $this->absences->removeElement($absences);
    }

    /**
     * Get absences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbsences()
    {
        return $this->absences;
    }

    /**
     * Set fonctions
     *
     * @param \GestionBundle\Entity\Fonction $fonctions
     * @return Employee
     */
    public function setFonctions(\GestionBundle\Entity\Fonction $fonctions = null)
    {
        $this->fonctions = $fonctions;

        return $this;
    }

    /**
     * Get fonctions
     *
     * @return \GestionBundle\Entity\Fonction 
     */
    public function getFonctions()
    {
        return $this->fonctions;
    }

    /**
     * Set departement
     *
     * @param \GestionBundle\Entity\Departement $departement
     * @return Employee
     */
    public function setDepartement(\GestionBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \GestionBundle\Entity\Departement 
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add formations
     *
     * @param \GestionBundle\Entity\Formation $formations
     * @return Employee
     */
    public function addFormation(\GestionBundle\Entity\Formation $formations)
    {
        $this->formations[] = $formations;

        return $this;
    }

    /**
     * Remove formations
     *
     * @param \GestionBundle\Entity\Formation $formations
     */
    public function removeFormation(\GestionBundle\Entity\Formation $formations)
    {
        $this->formations->removeElement($formations);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormations()
    {
        return $this->formations;
    }

    /**
     * Add employeeinterne
     *
     * @param \GestionBundle\Entity\Formation $employeeinterne
     * @return Employee
     */
    public function addEmployeeinterne(\GestionBundle\Entity\Formation $employeeinterne)
    {
        $this->employeeinterne[] = $employeeinterne;

        return $this;
    }

    /**
     * Remove employeeinterne
     *
     * @param \GestionBundle\Entity\Formation $employeeinterne
     */
    public function removeEmployeeinterne(\GestionBundle\Entity\Formation $employeeinterne)
    {
        $this->employeeinterne->removeElement($employeeinterne);
    }

    /**
     * Get employeeinterne
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployeeinterne()
    {
        return $this->employeeinterne;
    }

    /**
     * Set carriere
     *
     * @param \GestionBundle\Entity\Carriere $carriere
     * @return Employee
     */
    public function setCarriere(\GestionBundle\Entity\Carriere $carriere = null)
    {
        $this->carriere = $carriere;

        return $this;
    }

    /**
     * Get carriere
     *
     * @return \GestionBundle\Entity\Carriere 
     */
    public function getCarriere()
    {
        return $this->carriere;
    }

    /**
     * Add activites
     *
     * @param \GestionBundle\Entity\Activite $activites
     * @return Employee
     */
    public function addActivite(\GestionBundle\Entity\Activite $activites)
    {
        $this->activites[] = $activites;

        return $this;
    }

    /**
     * Remove activites
     *
     * @param \GestionBundle\Entity\Activite $activites
     */
    public function removeActivite(\GestionBundle\Entity\Activite $activites)
    {
        $this->activites->removeElement($activites);
    }

    /**
     * Get activites
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivites()
    {
        return $this->activites;
    }

    /**
     * Add employeDemande
     *
     * @param \GestionBundle\Entity\Demande_Formation $employeDemande
     * @return Employee
     */
    public function addEmployeDemande(\GestionBundle\Entity\Demande_Formation $employeDemande)
    {
        $this->employeDemande[] = $employeDemande;

        return $this;
    }

    /**
     * Remove employeDemande
     *
     * @param \GestionBundle\Entity\Demande_Formation $employeDemande
     */
    public function removeEmployeDemande(\GestionBundle\Entity\Demande_Formation $employeDemande)
    {
        $this->employeDemande->removeElement($employeDemande);
    }

    /**
     * Get employeDemande
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployeDemande()
    {
        return $this->employeDemande;
    }

    /**
     * Add demandeConge
     *
     * @param \GestionBundle\Entity\DemandeConge $demandeConge
     * @return Employee
     */
    public function addDemandeConge(\GestionBundle\Entity\DemandeConge $demandeConge)
    {
        $this->demandeConge[] = $demandeConge;

        return $this;
    }

    /**
     * Remove demandeConge
     *
     * @param \GestionBundle\Entity\DemandeConge $demandeConge
     */
    public function removeDemandeConge(\GestionBundle\Entity\DemandeConge $demandeConge)
    {
        $this->demandeConge->removeElement($demandeConge);
    }

    /**
     * Get demandeConge
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDemandeConge()
    {
        return $this->demandeConge;
    }

    /**
     * Set intergation
     *
     * @param \GestionBundle\Entity\Intergration $intergation
     * @return Employee
     */
    public function setIntergation(\GestionBundle\Entity\Intergration $intergation = null)
    {
        $this->intergation = $intergation;

        return $this;
    }

    /**
     * Get intergation
     *
     * @return \GestionBundle\Entity\Intergration 
     */
    public function getIntergation()
    {
        return $this->intergation;
    }

    /**
     * Set lieunais
     *
     * @param string $lieunais
     * @return Employee
     */
    public function setLieunais($lieunais)
    {
        $this->lieunais = $lieunais;

        return $this;
    }

    /**
     * Get lieunais
     *
     * @return string 
     */
    public function getLieunais()
    {
        return $this->lieunais;
    }

    /**
     * Set maison
     *
     * @param string $maison
     * @return Employee
     */
    public function setMaison($maison)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
     * @return string 
     */
    public function getMaison()
    {
        return $this->maison;
    }

    /**
     * Set gsm
     *
     * @param string $gsm
     * @return Employee
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;

        return $this;
    }

    /**
     * Get gsm
     *
     * @return string 
     */
    public function getGsm()
    {
        return $this->gsm;
    }
}
