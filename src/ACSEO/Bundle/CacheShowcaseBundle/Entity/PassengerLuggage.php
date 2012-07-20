<?php

namespace ACSEO\Bundle\CacheShowcaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ACSEO\Bundle\CacheShowcaseBundle\Entity\PassengerLuggage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ACSEO\Bundle\CacheShowcaseBundle\Entity\PassengerLuggageRepository")
 */
class PassengerLuggage
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
     * @var string $type
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var integer $weight
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var integer $length
     *
     * @ORM\Column(name="length", type="integer")
     */
    private $length;

    /**
     * @var integer $height
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;


    /**
     * @ORM\ManyToOne(targetEntity="Passenger", inversedBy="luggages")
     * @ORM\JoinColumn(name="passenger_id", referencedColumnName="id")
     **/
    private $passenger;
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
     * Set type
     *
     * @param string $type
     * @return PassengerLuggage
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
     * Set weight
     *
     * @param integer $weight
     * @return PassengerLuggage
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param integer $length
     * @return PassengerLuggage
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * Get length
     *
     * @return integer 
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return PassengerLuggage
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set passenger
     *
     * @param ACSEO\Bundle\CacheShowcaseBundle\Entity\Passenger $passenger
     * @return PassengerLuggage
     */
    public function setPassenger(\ACSEO\Bundle\CacheShowcaseBundle\Entity\Passenger $passenger = null)
    {
        $this->passenger = $passenger;
        return $this;
    }

    /**
     * Get passenger
     *
     * @return ACSEO\Bundle\CacheShowcaseBundle\Entity\Passenger 
     */
    public function getPassenger()
    {
        return $this->passenger;
    }
}