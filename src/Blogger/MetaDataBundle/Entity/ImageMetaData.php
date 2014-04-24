<?php

namespace Blogger\MetaDataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Blogger\MetaDataBundle\Entity\MetaData;

/**
 * ImageMetaData
 *
 * @ORM\Table(name="image_meta_data")
 * @ORM\Entity(repositoryClass="Blogger\MetaDataBundle\Entity\Repository\ImageMetaDataRepository")
 */
class ImageMetaData extends MetaData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer")
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer")
     */
    private $width;

    /**
     * @var integer
     *
     * @ORM\Column(name="dpi", type="integer")
     */
    private $dpi;


    /**
     * Set height
     *
     * @param integer $height
     * @return ImageMetaData
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
     * Set width
     *
     * @param integer $width
     * @return ImageMetaData
     */
    public function setWidth($width)
    {
        $this->width = $width;
    
        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set dpi
     *
     * @param integer $dpi
     * @return ImageMetaData
     */
    public function setDpi($dpi)
    {
        $this->dpi = $dpi;
    
        return $this;
    }

    /**
     * Get dpi
     *
     * @return integer 
     */
    public function getDpi()
    {
        return $this->dpi;
    }
}