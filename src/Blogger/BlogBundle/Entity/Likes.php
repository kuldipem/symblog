<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Likes
 *
 * @ORM\Table(name="likes")
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\Repository\LikesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Likes {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="likes")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $blog;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /**
     * @var $liker Intance of User
     * @ORM\ManyToOne(targetEntity="Blogger\UserBundle\Entity\User", inversedBy="likes" )
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $user;

    public function __construct() {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    
    

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Likes
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Likes
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Set blog
     *
     * @param \Blogger\BlogBundle\Entity\Blog $blog
     * @return Likes
     */
    public function setBlog(\Blogger\BlogBundle\Entity\Blog $blog = null) {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \Blogger\BlogBundle\Entity\Blog 
     */
    public function getBlog() {
        return $this->blog;
    }

    /* LIKE'S STATUS CONSTANTS */

    const LIKE_STATUS_LIKE = "LIKE";
    const LIKE_STATUS_UNLIKE = "UNLIKE";



    /**
     * Set user
     *
     * @param \Blogger\UserBundle\Entity\User $user
     * @return Likes
     */
    public function setUser(\Blogger\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Blogger\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}