<?php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Saison
 *
 * @ORM\Table(name="saison")
 * @ORM\Entity(repositoryClass="IglesBundle\Repository\SaisonRepository")
 */
class Saison
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
     * @ORM\OneToOne(targetEntity= "Poster", cascade={"all"})
     */
    private $saisonPoster;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_saisons", type="text")
     */
    private $resumeSaisons;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_saisons", type="integer")
     */
    private $numeroSaisons;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Series", inversedBy="saisons")
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Episodes", mappedBy="saison", cascade={"remove"})
     */
    private $episodes;
    
     /**
     * @var boolean
     * @ORM\Column(name="moderationSaison", type="boolean", nullable=false, options={"default":true})
     *
     */
    private $moderationSaison = 0;
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
     * Set resumeSaisons
     *
     * @param string $resumeSaisons
     * @return Saison
     */
    public function setResumeSaisons($resumeSaisons)
    {
        $this->resumeSaisons = $resumeSaisons;

        return $this;
    }

    /**
     * Get resumeSaisons
     *
     * @return string 
     */
    public function getResumeSaisons()
    {
        return $this->resumeSaisons;
    }

    /**
     * Set numeroSaisons
     *
     * @param string $numeroSaisons
     * @return Saison
     */
    public function setNumeroSaisons($numeroSaisons)
    {
        $this->numeroSaisons = $numeroSaisons;

        return $this;
    }

    /**
     * Get numeroSaisons
     *
     * @return string 
     */
    public function getNumeroSaisons()
    {
        return $this->numeroSaisons;
    }

    /**
     * Set series
     *
     * @param string $series
     * @return Saison
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get series
     *
     * @return string 
     */
    public function getSerie()
    {
        return $this->serie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episodes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add episodes
     *
     * @param \IglesBundle\Entity\Episodes $episodes
     * @return Saison
     */
    public function addEpisode(\IglesBundle\Entity\Episodes $episodes)
    {
        $this->episodes[] = $episodes;

        return $this;
    }

    /**
     * Remove episodes
     *
     * @param \IglesBundle\Entity\Episodes $episodes
     */
    public function removeEpisode(\IglesBundle\Entity\Episodes $episodes)
    {
        $this->episodes->removeElement($episodes);
    }

    /**
     * Get episodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Set moderationSaison
     *
     * @param boolean $moderationSaison
     * @return Saison
     */
    public function setModerationSaison($moderationSaison)
    {
        $this->moderationSaison = $moderationSaison;

        return $this;
    }

    /**
     * Get moderationSaison
     *
     * @return boolean 
     */
    public function getModerationSaison()
    {
        return $this->moderationSaison;
    }

    /**
     * Set saisonPoster
     *
     * @param \IglesBundle\Entity\Poster $saisonPoster
     * @return Saison
     */
    public function setSaisonPoster(\IglesBundle\Entity\Poster $saisonPoster = null)
    {
        $this->saisonPoster = $saisonPoster;

        return $this;
    }

    /**
     * Get saisonPoster
     *
     * @return \IglesBundle\Entity\Poster 
     */
    public function getSaisonPoster()
    {
        return $this->saisonPoster;
    }
}
