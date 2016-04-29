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


}
