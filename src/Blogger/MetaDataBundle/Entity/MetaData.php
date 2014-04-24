<?php

namespace Blogger\MetaDataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MetaData
 *
 * @ORM\Table(name="metadata")
 * @ORM\Entity(repositoryClass="Blogger\MetaDataBundle\Entity\Repository\MetaDataRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type",type="string")
 * @ORM\DiscriminatorMap({"image"="ImageMetaData","video"="VideoMetaData","text"="TextFileMetaData"})
 */
 abstract class MetaData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * 
     * @var string
     *
     * @ORM\Column(name="extention", type="string", length=255)
     */
    private $extention;

    /**
     * 
     * @var string
     *
     * @ORM\Column(name="mime_type",type="string", length=255)
     */
    private $mimeType;

    /**
     * 
     * @var string
     *
     * @ORM\Column(name="size",type="string",length=255)
     */
    private $size;
    
    /**
     * @var datetime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationTime;

    /**
     * @var datetime
     *
     * @ORM\Column(name="modified_date", type="datetime")
     */
    private $modifiedTime;
    
    
    /**
     * 
     * @var string
     *
     * @ORM\Column(name="author",type="string",length=255)
     */
    private $author;

    
    
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
     * Set extention
     *
     * @param string $extention
     * @return MetaData
     */
    public function setExtention($extention)
    {
        $this->extention = $extention;
    
        return $this;
    }

    /**
     * Get extention
     *
     * @return string 
     */
    public function getExtention()
    {
        return $this->extention;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return MetaData
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    
        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string 
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return MetaData
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set creationTime
     *
     * @param \DateTime $creationTime
     * @return MetaData
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
    
        return $this;
    }

    /**
     * Get creationTime
     *
     * @return \DateTime 
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * Set modifiedTime
     *
     * @param \DateTime $modifiedTime
     * @return MetaData
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modifiedTime = $modifiedTime;
    
        return $this;
    }

    /**
     * Get modifiedTime
     *
     * @return \DateTime 
     */
    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return MetaData
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}