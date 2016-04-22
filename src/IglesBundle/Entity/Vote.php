<?php
// src/MyProject/MyBundle/Entity/Vote.php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\CommentBundle\Entity\Vote as BaseVote;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Vote extends BaseVote
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Comment of this vote
     *
     * @var Comment
     * @ORM\ManyToOne(targetEntity="Comment")
     */
    protected $comment;

    /**
     * Séries
     *
     * @var Series
     * @ORM\ManyToOne(targetEntity="Series")
     */
    protected $series;
}