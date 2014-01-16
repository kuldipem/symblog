<?php

namespace Blogger\FriendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FriendRequest
 *
 * @ORM\Table(name="friend_requests")
 * @ORM\Entity(repositoryClass="Blogger\FriendBundle\Entity\Repository\FriendRequestRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class FriendRequest {

    const FRIEND_REQUEST_BLOCKED_BY_TO = -2;  // IF REQUEST IS BLOCKED BY USER WHO SEND FRIEND REQUEST 
    const FRIEND_REQUEST_BLOCKED_BY_FROM = -1; // IF REQUEST IS BLOCKED BY USER WHO SEND FRIEND REQUEST
    const FRIEND_REQUEST_SEND = 1;  // IF REQUEST IS SEND BY USER  , DEFAULT STATUS 
    const FRIEND_REQUEST_IGNORED = 2;  // IF REQUEST IS IGNORED SIMPLY BY USER WHO RECIEVCE FRIEND REQUEST 
    const FRIEND_REQUEST_CANCLED = 3; //  IF REQUEST IS CANCLED BY USER WHO SEND FRIEND REQUEST 

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Blogger\UserBundle\Entity\User", inversedBy="getFriendRequests" )
     * @ORM\JoinColumn(referencedColumnName="id", name="request_by_user_id" )
     */
    private $requestBy;

  
    /**
     * @ORM\ManyToOne(targetEntity="Blogger\UserBundle\Entity\User", inversedBy="sendFriendRequests" )
     * @ORM\JoinColumn(referencedColumnName="id", name="request_to_user_id" )
     */
    private $requestTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    function __construct() {
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
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
     * Set status
     *
     * @param integer $status
     * @return FriendRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return FriendRequest
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return FriendRequest
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }


    /**
     * Set requestBy
     *
     * @param \Blogger\UserBundle\Entity\User $requestBy
     * @return FriendRequest
     */
    public function setRequestBy(\Blogger\UserBundle\Entity\User $requestBy = null)
    {
        $this->requestBy = $requestBy;
    
        return $this;
    }

    /**
     * Get requestBy
     *
     * @return \Blogger\UserBundle\Entity\User 
     */
    public function getRequestBy()
    {
        return $this->requestBy;
    }

    /**
     * Set requestTo
     *
     * @param \Blogger\UserBundle\Entity\User $requestTo
     * @return FriendRequest
     */
    public function setRequestTo(\Blogger\UserBundle\Entity\User $requestTo = null)
    {
        $this->requestTo = $requestTo;
    
        return $this;
    }

    /**
     * Get requestTo
     *
     * @return \Blogger\UserBundle\Entity\User 
     */
    public function getRequestTo()
    {
        return $this->requestTo;
    }
}