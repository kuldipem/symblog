<?php

namespace Blogger\UserBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Serializable;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\True;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * User
 *
 * @ORM\Table(name="user" )
 * @ORM\Entity(repositoryClass="Blogger\UserBundle\Entity\Repository\UserRepository")
 * @UniqueEntity(fields="email", message="Email is already taken.")
 * @UniqueEntity(fields="username", message="Username is already used.")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements AdvancedUserInterface, Serializable, EquatableInterface {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @NotBlank(message="Username can't be blank.")
     * 
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     * @NotBlank(message="Firstname is blank.")
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="middlename", type="string", length=255)
     * @NotBlank(message="Middlename is blank.")
     */
    private $middlename;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @NotBlank(message="Lastname is blank.")
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=10, columnDefinition="ENUM('MALE','FEMALE')" )
     */
    private $sex;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="birthdate", type="date" )
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @NotBlank(message="Email is blank.")
     * @Email(message="Email is not valid.", checkMX=false, checkHost=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @NotBlank(message="Password is blank.");
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;

    /**
     * @var string
     * @ORM\Column(name="roles", type="array" )
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Blog", mappedBy="user")
     */
    protected $blogs;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Comment", mappedBy="user")
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="Blogger\BlogBundle\Entity\Likes", mappedBy="user")
     */
    protected $likes;


    /**
     * @ORM\OneToMany(targetEntity="Blogger\FriendBundle\Entity\FriendRequest", mappedBy="requestTo")
     */
    protected $getFriendRequests;
    
    /**
     * @ORM\OneToMany(targetEntity="Blogger\FriendBundle\Entity\FriendRequest", mappedBy="requestBy")
     */
    protected $sendFriendRequests;
    

    /**
     * @ORM\OneToOne(targetEntity="UserSecurity", mappedBy="user" )
     */
    protected $security;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $image;

    /**
     * @ORM\Column(type="date")
     */
    protected $created;

    /**
     * @ORM\Column(type="date")
     */
    protected $updated;

    /*
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    public function __toString() {
        return $this->getUsername();
    }

    public function __construct() {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        $this->roles = array('ROLE_USER');
        $this->setCreated(new DateTime());
        $this->setUpdated(new DateTime());
        $this->image='';
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        $this->setUpdated(new DateTime());
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
     * Set firstname
     *  
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set middlename
     *
     * @param string $middlename
     * @return User
     */
    public function setMiddlename($middlename) {
        $this->middlename = $middlename;

        return $this;
    }

    /**
     * Get middlename
     *
     * @return string 
     */
    public function getMiddlename() {
        return $this->middlename;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex) {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex() {
        return $this->sex;
    }

    /**
     * Set birthdate
     *
     * @param DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return DateTime 
     */
    public function getBirthdate() {
        return $this->birthdate;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return $this->roles;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getUsername() {
        return $this->username;
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->isActive;
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->username,
            $this->salt,
            $this->password,
        ));
    }

    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->salt,
                $this->password,
                ) = unserialize($serialized);
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set roles
     *
     * @param string $roles
     * @return User
     */
    public function setRoles($roles) {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive() {
        return $this->isActive;
    }

    public function isEqualTo(UserInterface $user) {
        return $this->id === $user->getId();
    }

    /**
     * Add blogs
     *
     * @param \Blogger\BlogBundle\Entity\Blog $blogs
     * @return User
     */
    public function addBlog(\Blogger\BlogBundle\Entity\Blog $blogs) {
        $this->blogs[] = $blogs;

        return $this;
    }

    /**
     * Remove blogs
     *
     * @param \Blogger\BlogBundle\Entity\Blog $blogs
     */
    public function removeBlog(\Blogger\BlogBundle\Entity\Blog $blogs) {
        $this->blogs->removeElement($blogs);
    }

    /**
     * Get blogs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlogs() {
        return $this->blogs;
    }

    /**
     * Add comments
     *
     * @param \Blogger\BlogBundle\Entity\Comment $comments
     * @return User
     */
    public function addComment(\Blogger\BlogBundle\Entity\Comment $comments) {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Blogger\BlogBundle\Entity\Comment $comments
     */
    public function removeComment(\Blogger\BlogBundle\Entity\Comment $comments) {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments() {
        return $this->comments;
    }

    /**
     * Add likes
     *
     * @param \Blogger\BlogBundle\Entity\Likes $likes
     * @return User
     */
    public function addLike(\Blogger\BlogBundle\Entity\Likes $likes) {
        $this->likes[] = $likes;

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \Blogger\BlogBundle\Entity\Likes $likes
     */
    public function removeLike(\Blogger\BlogBundle\Entity\Likes $likes) {
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikes() {
        return $this->likes;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return User
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage() {
        return $this->image;
    }

    public function setFile(UploadedFile $file) {
        $this->file = $file;
    }

    public function getFile() {
        return $this->file;
    }

    public static function getAbsolutePath() {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }

    public static function getWebPath() {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }

    public static function getUploadDir() {
        return "upload/user_images";
    }

    public static function getUploadRootDir() {
        return __DIR__ . "/../../../../web/" . $this->getUploadDir();
    }

    /**
     * Set security
     *
     * @param \Blogger\UserBundle\Entity\UserSecurity $security
     * @return User
     */
    public function setSecurity(\Blogger\UserBundle\Entity\UserSecurity $security = null) {
        $this->security = $security;

        return $this;
    }

    /**
     * Get security
     *
     * @return \Blogger\UserBundle\Entity\UserSecurity 
     */
    public function getSecurity() {
        return $this->security;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
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
     * @return User
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
     * Add getFriendRequests
     *
     * @param \Blogger\FriendBundle\Entity\FriendRequest $getFriendRequests
     * @return User
     */
    public function addGetFriendRequest(\Blogger\FriendBundle\Entity\FriendRequest $getFriendRequests)
    {
        $this->getFriendRequests[] = $getFriendRequests;
    
        return $this;
    }

    /**
     * Remove getFriendRequests
     *
     * @param \Blogger\FriendBundle\Entity\FriendRequest $getFriendRequests
     */
    public function removeGetFriendRequest(\Blogger\FriendBundle\Entity\FriendRequest $getFriendRequests)
    {
        $this->getFriendRequests->removeElement($getFriendRequests);
    }

    /**
     * Get getFriendRequests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGetFriendRequests()
    {
        return $this->getFriendRequests;
    }

    /**
     * Add sendFriendRequests
     *
     * @param \Blogger\FriendBundle\Entity\FriendRequest $sendFriendRequests
     * @return User
     */
    public function addSendFriendRequest(\Blogger\FriendBundle\Entity\FriendRequest $sendFriendRequests)
    {
        $this->sendFriendRequests[] = $sendFriendRequests;
    
        return $this;
    }

    /**
     * Remove sendFriendRequests
     *
     * @param \Blogger\FriendBundle\Entity\FriendRequest $sendFriendRequests
     */
    public function removeSendFriendRequest(\Blogger\FriendBundle\Entity\FriendRequest $sendFriendRequests)
    {
        $this->sendFriendRequests->removeElement($sendFriendRequests);
    }

    /**
     * Get sendFriendRequests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSendFriendRequests()
    {
        return $this->sendFriendRequests;
    }
}