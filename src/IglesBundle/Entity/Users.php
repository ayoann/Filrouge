<?php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\MessageBundle\Model\ParticipantInterface;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="IglesBundle\Repository\UsersRepository")
 */
class Users extends BaseUser implements ParticipantInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="lastName", type="string")
     * 
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $lastName;

    /**
     * @var string
     * @ORM\Column(name="firstName", type="string")
     * 
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $firstName;

    /**
     * @var datetime
     * @ORM\Column(name="birthday", type="datetime")
     * 
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $birthday;

    /**
     *
     * @ORM\ManyToMany(targetEntity="IglesBundle\Entity\Series")
     */
    private $follow;

    /**
     *
     * @ORM\ManyToMany(targetEntity="IglesBundle\Entity\Episodes")
     */
    private $watch;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getlastName()
    {
        return $this->lastName;
    }

    public function getfirstName()
    {
        return $this->firstName;
    }

    public function getbirthday()
    {
        return $this->birthday;
    }

    
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setbirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function __construct()
    {
        parent::__construct();

    $this->roles = array('ROLE_USER'); // Ajoute le ROLE_USER par défaut lors de l'inscription au site
    }



    /**
     * Add follow
     *
     * @param \IglesBundle\Entity\Series $follow
     * @return Users
     */
    public function addFollow(\IglesBundle\Entity\Series $follow)
    {
        $this->follow[] = $follow;

        return $this;
    }

    /**
     * Remove follow
     *
     * @param \IglesBundle\Entity\Series $follow
     */
    public function removeFollow(\IglesBundle\Entity\Series $follow)
    {
        $this->follow->removeElement($follow);
    }

    /**
     * Check if User Follow or Not a Serie
     *
     * @param Series $series
     *
     * @return bool
     */
    public function Suivre(Series $series){
        if ($this->follow->contains($series)){
            return true;
        }
        return false;
    }

    /**
     * Get follow
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFollow()
    {
        return $this->follow;
    }

    /**
     * Add watch
     *
     * @param \IglesBundle\Entity\Episodes $watch
     * @return Users
     */
    public function addWatch(\IglesBundle\Entity\Episodes $watch)
    {
        $this->watch[] = $watch;

        return $this;
    }

    /**
     * Remove watch
     *
     * @param \IglesBundle\Entity\Episodes $watch
     */
    public function removeWatch(\IglesBundle\Entity\Episodes $watch)
    {
        $this->watch->removeElement($watch);
    }

    /**
     * Get watch
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWatch()
    {
        return $this->watch;
    }

    public function Vue(Episodes $episodes){
        if ($this->watch->contains($episodes)){
            return true;
        }
        return false;
    }
}
