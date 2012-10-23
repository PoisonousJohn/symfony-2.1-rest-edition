<?php

namespace Push\PointsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Push\PointsBundle\Entity\Point
 */
class Point
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var float $latitude
     */
    private $latitude;

    /**
     * @var float $longitude
     */
    private $longitude;

    /**
     * @var float $radius
     */
    private $radius;

    /**
     * @var \DateTime $startTime
     */
    private $startTime;

    /**
     * @var \DateTime $endTime
     */
    private $endTime;

    /**
     * @var boolean $allDay
     */
    private $allDay;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $image;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $imageHd;

    /**
     * @var Checkin[]
     */
    private $checkins;

    function __construct()
    {
        $this->checkins = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Point
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
     * Set latitude
     *
     * @param float $latitude
     * @return Point
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Point
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set radius
     *
     * @param float $radius
     * @return Point
     */
    public function setRadius($radius)
    {
        $this->radius = $radius;
    
        return $this;
    }

    /**
     * Get radius
     *
     * @return float 
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Point
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    
        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Point
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Point
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;
    
        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function isAllDay()
    {
        return $this->allDay;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Point
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \Application\Sonata\MediaBundle\Entity\Media $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param \Application\Sonata\MediaBundle\Entity\Media $imageHd
     */
    public function setImageHd($imageHd)
    {
        $this->imageHd = $imageHd;
    }

    /**
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getImageHd()
    {
        return $this->imageHd;
    }

    public function setCheckins($checkins)
    {
        $this->checkins = $checkins;
    }

    public function getCheckins()
    {
        return $this->checkins;
    }

    function __toString()
    {
        return $this->getName();
    }


}
