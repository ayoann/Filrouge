<?php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Episodes
 *
 * @ORM\Table(name="episodes")
 * @ORM\Entity(repositoryClass="IglesBundle\Repository\EpisodesRepository")
 */
class Episodes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_episode", type="string", length=255)
     */
    private $nomEpisode;

    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity= "Poster", cascade={"all"})
     */
    private $episodePoster;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_episode", type="text", length=500)
     */
    private $resumeEpisode;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_episode", type="integer")
     */
    private $numeroEpisode;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Saison", inversedBy="episodes")
     */
    private $saison;

    /**
     * @var boolean
     * @ORM\Column(name="moderationEpisode", type="boolean", nullable=false, options={"default":true})
     *
     */
    private $moderationEpisode = 0;


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
     * Set nomEpisode
     *
     * @param string $nomEpisode
     * @return Episodes
     */
    public function setNomEpisode($nomEpisode)
    {
        $this->nomEpisode = $nomEpisode;

        return $this;
    }

    /**
     * Get nomEpisode
     *
     * @return string 
     */
    public function getNomEpisode()
    {
        return $this->nomEpisode;
    }
    

    /**
     * Set resumeEpisode
     *
     * @param string $resumeEpisode
     * @return Episodes
     */
    public function setResumeEpisode($resumeEpisode)
    {
        $this->resumeEpisode = $resumeEpisode;

        return $this;
    }

    /**
     * Get resumeEpisode
     *
     * @return string 
     */
    public function getResumeEpisode()
    {
        return $this->resumeEpisode;
    }

    /**
     * Set numeroEpisode
     *
     * @param string $numeroEpisode
     * @return Episodes
     */
    public function setNumeroEpisode($numeroEpisode)
    {
        $this->numeroEpisode = $numeroEpisode;

        return $this;
    }

    /**
     * Get numeroEpisode
     *
     * @return string 
     */
    public function getNumeroEpisode()
    {
        return $this->numeroEpisode;
    }

    /**
     * Set saison
     *
     * @param string $saison
     * @return Episodes
     */
    public function setSaison($saison)
    {
        $this->saison = $saison;

        return $this;
    }

    /**
     * Get saison
     *
     * @return string 
     */
    public function getSaison()
    {
        return $this->saison;
    }

    /**
     * Set moderationEpisode
     *
     * @param boolean $moderationEpisode
     * @return Episodes
     */
    public function setModerationEpisode($moderationEpisode)
    {
        $this->moderationEpisode = $moderationEpisode;

        return $this;
    }

    /**
     * Get moderationEpisode
     *
     * @return boolean 
     */
    public function getModerationEpisode()
    {
        return $this->moderationEpisode;
    }

    /**
     * Set episodePoster
     *
     * @param \IglesBundle\Entity\Poster $episodePoster
     * @return Episodes
     */
    public function setEpisodePoster(\IglesBundle\Entity\Poster $episodePoster = null)
    {
        $this->episodePoster = $episodePoster;

        return $this;
    }

    /**
     * Get episodePoster
     *
     * @return \IglesBundle\Entity\Poster 
     */
    public function getEpisodePoster()
    {
        return $this->episodePoster;
    }
}
