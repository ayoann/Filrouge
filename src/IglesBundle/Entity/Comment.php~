<?php
// src/MyProject/MyBundle/Entity/Comment.php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Comment as BaseComment;
use FOS\CommentBundle\Model\SignedCommentInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment implements SignedCommentInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Author of the comment
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @var User
     */
    protected $author;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="comments")
     */
    protected $users;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Series", inversedBy="commentaire_serie")
     */
    private $serie;


    /**
     * Thread of this comment
     *
     * @var Thread
     * @ORM\ManyToOne(targetEntity="Thread")
     */
    protected $thread;

    /**
     * Set users
     *
     * @param \IglesBundle\Entity\Users $users
     * @return Comment
     */
    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getAuthorName()
    {
        if (null === $this->getAuthor()) {
            return 'Anonymous';
        }

        return $this->getAuthor()->getUsername();
    }
    public function setUsers(\IglesBundle\Entity\Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \IglesBundle\Entity\Users 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set serie
     *
     * @param \IglesBundle\Entity\Series $serie
     * @return Comment
     */
    public function setSerie(\IglesBundle\Entity\Series $serie = null)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return \IglesBundle\Entity\Series 
     */
    public function getSerie()
    {
        return $this->serie;
    }
}
