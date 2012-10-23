<?php

namespace Push\PointsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Push\PointsBundle\Entity\Checkin
 */
class Checkin
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $latitude
     */
    private $latitude;

    /**
     * @var string $longitude
     */
    private $longitude;

    /**
     * @var \DateTime $createdAt
     */
    private $createdAt;

    /**
     * @var string $udid
     */
    private $udid;

    /**
     * @var Point
     */
    private $point;

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
     * Set latitude
     *
     * @param string $latitude
     * @return Checkin
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Checkin
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Checkin
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set udid
     *
     * @param string $udid
     * @return Checkin
     */
    public function setUdid($udid)
    {
        $this->udid = $udid;
    
        return $this;
    }

    /**
     * Get udid
     *
     * @return string 
     */
    public function getUdid()
    {
        return $this->udid;
    }

    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @param \Push\PointsBundle\Entity\Point $point
     */
    public function setPoint($point)
    {
        $this->point = $point;
    }

    /**
     * @return \Push\PointsBundle\Entity\Point
     */
    public function getPoint()
    {
        return $this->point;
    }
}
