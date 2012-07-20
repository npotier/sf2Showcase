<?php

namespace ACSEO\Bundle\CacheShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACSEO\Bundle\CacheShowcaseBundle\Entity\Passenger
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACSEO\Bundle\CacheShowcaseBundle\Entity\PassengerRepository")
 */
class Passenger
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
     * @var integer $gender
     *
     * @ORM\Column(name="gender", type="integer")
     */
    private $gender;

    /**
     * @var datetime $dateOfBirth
     *
     * @ORM\Column(name="dateOfBirth", type="datetime")
     */
    private $dateOfBirth;

    /**
     * @var string $seatNumber
     *
     * @ORM\Column(name="seatNumber", type="string", length=5)
     */
    private $seatNumber;

    /**
     * @ORM\ManyToOne(targetEntity="Plane", inversedBy="passengers")
     * @ORM\JoinColumn(name="plane_id", referencedColumnName="id")
     */
    private $plane;
    
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
     * @return Passenger
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
     * @return Passenger
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
     * Set gender
     *
     * @param integer $gender
     * @return Passenger
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set dateOfBirth
     *
     * @param datetime $dateOfBirth
     * @return Passenger
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

    /**
     * Set seatNumber
     *
     * @param string $seatNumber
     * @return Passenger
     */
    public function setSeatNumber($seatNumber)
    {
        $this->seatNumber = $seatNumber;
        return $this;
    }

    /**
     * Get seatNumber
     *
     * @return string 
     */
    public function getSeatNumber()
    {
        return $this->seatNumber;
    }
}