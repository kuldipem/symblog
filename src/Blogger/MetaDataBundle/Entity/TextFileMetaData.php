<?php

namespace Blogger\MetaDataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Blogger\MetaDataBundle\Entity\MetaData;

/**
 * VideoMetaData
 *
 * @ORM\Table(name="text_file_meta_data")
 * @ORM\Entity(repositoryClass="Blogger\MetaDataBundle\Entity\Repository\TextFileMetaDataRepository")
 */
class TextFileMetaData extends MetaData
{
    /**
     * @var integer
     *
     * @ORM\Column(name="line", type="integer")
     */
    private $line;

    /**
     * @var integer
     *
     * @ORM\Column(name="cols", type="integer")
     */
    private $cols;
    
    /**
     * @var string
     *
     * @ORM\Column(name="encoding", type="string")
     */
    private $encoding;




    /**
     * Set line
     *
     * @param integer $line
     * @return TextFileMetaData
     */
    public function setLine($line)
    {
        $this->line = $line;
    
        return $this;
    }

    /**
     * Get line
     *
     * @return integer 
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Set cols
     *
     * @param integer $cols
     * @return TextFileMetaData
     */
    public function setCols($cols)
    {
        $this->cols = $cols;
    
        return $this;
    }

    /**
     * Get cols
     *
     * @return integer 
     */
    public function getCols()
    {
        return $this->cols;
    }

    /**
     * Set encoding
     *
     * @param string $encoding
     * @return TextFileMetaData
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    
        return $this;
    }

    /**
     * Get encoding
     *
     * @return string 
     */
    public function getEncoding()
    {
        return $this->encoding;
    }
}