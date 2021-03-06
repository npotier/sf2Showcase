<?php

namespace ACSEO\Bundle\CacheShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACSEO\Bundle\CacheShowcaseBundle\Entity\Pilot
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACSEO\Bundle\CacheShowcaseBundle\Entity\PilotRepository")
 */
class Pilot
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var datetime $dateOfBirth
     *
     * @ORM\Column(name="dateOfBirth", type="datetime")
     */
    private $dateOfBirth;


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
     * Set firstname
     *
     * @param string $firstname
     * @return Pilot
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Pilot
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set dateOfBirth
     *
     * @param datetime $dateOfBirth
     * @return Pilot
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return datetime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}