<?php

namespace Blogger\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserSecurity
 *
 * @ORM\Table(name="user_security")
 * @ORM\Entity(repositoryClass="Blogger\UserBundle\Entity\Repository\UserSecurityRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class UserSecurity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="security" )
     * @ORM\JoinColumn(name="user_id" , referencedColumnName="id")
     */
    private $user;
    
    
    private $firstLevel;
    
    private $secondLevel;
    
    /**
     * @ORM\Column(name="reset_code", type="string" , length=255 )
     * 
     */
    private $resetCode;
    
    /**
     * @ORM\Column(name="generation_date", type="datetime" )
     * 
     */
    private $generationDate;
    
    /**
     * @ORM\Column(name="is_last_code_used", type="boolean" )
     * 
     */
    private $isLastCodeUsed;
    
    
    /**
     * @ORM\Column(name="password_history", type="array" )
     */
    protected $passwordHistory;
    
    
    /**
     * @ORM\Column(name="created_at" , type="datetime" )
     */
    protected $createdAt;
    
    /**
     * @ORM\Column(name="updated_at" , type="datetime" )
     */
    protected $updatedAt;
    
    
    
    public function __construct() {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->setIsLastCodeUsed(false);
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
     * Set resetCode
     *
     * @param string $resetCode
     * @return UserSecurity
     */
    public function setResetCode($resetCode)
    {
        $this->resetCode = $resetCode;
    
        return $this;
    }

    /**
     * Get resetCode
     *
     * @return string 
     */
    public function getResetCode()
    {
        return $this->resetCode;
    }

    /**
     * Set generationDate
     *
     * @param \DateTime $generationDate
     * @return UserSecurity
     */
    public function setGenerationDate($generationDate)
    {
        $this->generationDate = $generationDate;
    
        return $this;
    }

    /**
     * Get generationDate
     *
     * @return \DateTime 
     */
    public function getGenerationDate()
    {
        return $this->generationDate;
    }

    /**
     * Set isLastCodeUsed
     *
     * @param boolean $isLastCodeUsed
     * @return UserSecurity
     */
    public function setIsLastCodeUsed($isLastCodeUsed)
    {
        $this->isLastCodeUsed = $isLastCodeUsed;
    
        return $this;
    }

    /**
     * Get isLastCodeUsed
     *
     * @return boolean 
     */
    public function getIsLastCodeUsed()
    {
        return $this->isLastCodeUsed;
    }

    /**
     * Set passwordHistory
     *
     * @param array $passwordHistory
     * @return UserSecurity
     */
    public function setPasswordHistory($passwordHistory)
    {
        $this->passwordHistory = $passwordHistory;
    
        return $this;
    }

    /**
     * Get passwordHistory
     *
     * @return array 
     */
    public function getPasswordHistory()
    {
        return $this->passwordHistory;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserSecurity
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
     * Set updatedAt
     * @param \DateTime $updatedAt
     * @return UserSecurity
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updatedAt = new \DateTime();
    
        return $this;
    }
    
    

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \Blogger\UserBundle\Entity\User $user
     * @return UserSecurity
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