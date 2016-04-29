<?php
// src/MyProject/MyBundle/Entity/Rating.php

namespace IglesBundle\Entity;

use DCS\RatingBundle\Entity\Rating as BaseRating;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Rating extends BaseRating
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="IglesBundle\Entity\VoteRating", mappedBy="rating")
     */
    protected $votes;

    /**
     * @ORM\OneToMany(targetEntity="Series", mappedBy="note")
     */
    protected $note_serie;

    /**
     * Add note_serie
     *
     * @param \IglesBundle\Entity\Series $noteSerie
     * @return Rating
     */
    public function addNoteSerie(\IglesBundle\Entity\Series $noteSerie)
    {
        $this->note_serie[] = $noteSerie;

        return $this;
    }

    /**
     * Remove note_serie
     *
     * @param \IglesBundle\Entity\Series $noteSerie
     */
    public function removeNoteSerie(\IglesBundle\Entity\Series $noteSerie)
    {
        $this->note_serie->removeElement($noteSerie);
    }

    /**
     * Get note_serie
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNoteSerie()
    {
        return $this->note_serie;
    }
}
