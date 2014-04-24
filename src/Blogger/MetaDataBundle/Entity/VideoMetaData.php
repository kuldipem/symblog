<?php

namespace Blogger\MetaDataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Blogger\MetaDataBundle\Entity\MetaData;

/**
 * VideoMetaData
 *
 * @ORM\Table(name="video_meta_data")
 * @ORM\Entity(repositoryClass="Blogger\MetaDataBundle\Entity\Repository\VideoMetaDataRepository")
 */
class VideoMetaData extends MetaData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;

    /**
     * @var integer
     * frame per second rate 
     *
     * @ORM\Column(name="fps", type="integer")
     */
    private $fps;



    /**
     * Set duration
     *
     * @param integer $duration
     * @return VideoMetaData
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set fps
     *
     * @param integer $fps
     * @return VideoMetaData
     */
    public function setFps($fps)
    {
        $this->fps = $fps;
    
        return $this;
    }

    /**
     * Get fps
     *
     * @return integer 
     */
    public function getFps()
    {
        return $this->fps;
    }
}