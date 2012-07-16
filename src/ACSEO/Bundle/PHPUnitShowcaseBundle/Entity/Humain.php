<?php

namespace ACSEO\Bundle\PHPUnitShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\Humain
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACSEO\Bundle\PHPUnitShowcaseBundle\Entity\HumainRepository")
 */
class Humain
{

    public static $SEXE_MASCULIN = 0;
    public static $SEXE_FEMININ  = 1;

    public static $ORIENTATION_HETERO = 0;
    public static $ORIENTATION_HOMO   = 1;
    public static $ORIENTATION_BI     = 2;
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $prenom
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     * @Assert\MaxLength(255)
     */
    private $prenom;

    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\MaxLength(255)
     */
    private $nom;

    /**
     * @var string $dateNaissance
     *
     * @ORM\Column(name="dateNaissance", type="datetime")
     */
    private $dateNaissance;

    /**
     * @var integer $sexe
     *
     * @ORM\Column(name="sexe", type="integer")
     */
    private $sexe;

    /**
     * @var integer $orientationSexuelle
     *
     * @ORM\Column(name="orientation_sexuelle", type="integer")
     */
    private $orientationSexuelle;

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
     * Set prenom
     *
     * @param string $prenom
     * @return Humain
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
     * Set nom
     *
     * @param string $nom
     * @return Humain
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
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return Humain
     */
    public function setDateNaissance($dateNaissance)
    {
        //Vérifie que la chaine de caractère passée en paramètre est valide
        if (false == $dateNaissance instanceof \DateTime) {
            try {
                $dateNaissance = new \DateTime($dateNaissance);
            }
            catch(\Exception $e) {
                throw new \InvalidArgumentException("La date passée en paramètre n'est pas valide");
            }
        }
        //Vérifie  si l'année est supérieure à 1900
        if (1900 > (int) $dateNaissance->format("Y")) {
            throw new \InvalidArgumentException("La date passée en paramètre n'est pas valide, elle doit être supérieure à l'année 1900");   
        }

        //Vérifie  si l'année est supérieure à l'année courante
        if ((int) date('Y') < (int) $dateNaissance->format("Y")) {
            throw new \InvalidArgumentException("La date passée en paramètre n'est pas valide, elle doit être inférieure à l'année ". date("Y"));   
        }

        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    /**
     * Set sexe
     *
     * @param integer $sexe
     * @return Humain
     */
    public function setSexe($sexe)
    {
        if (Humain::$SEXE_FEMININ != $sexe && Humain::$SEXE_MASCULIN !=  $sexe) {
            throw new \InvalidArgumentException("Le sexe n'est pas reconnu");
        }
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * Get sexe
     *
     * @return integer 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set orientationSexuelle
     *
     * @param integer $orientationSexuelle
     * @return Humain
     */
    public function setOrientationSexuelle($orientationSexuelle)
    {
        if ( Humain::$ORIENTATION_BI != $orientationSexuelle &&
             Humain::$ORIENTATION_HOMO != $orientationSexuelle && 
             Humain::$ORIENTATION_HETERO != $orientationSexuelle
            ) {
            throw new \InvalidArgumentException("Cette orientation sexuelle n'est pas reconnue");   
        }
        $this->orientationSexuelle = $orientationSexuelle;
        return $this;
    }

    /**
     * Get orientationSexuelle
     *
     * @return integer 
     */
    public function getOrientationSexuelle()
    {
        return $this->orientationSexuelle;
    }
}