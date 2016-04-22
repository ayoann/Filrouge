<?php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Series
 *
 * @ORM\Table(name="series")
 * @ORM\Entity(repositoryClass="IglesBundle\Repository\SeriesRepository")
 */
class Series
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
     * @ORM\Column(name="nom_serie", type="string", length=255)
     */
    private $nomSerie;

    /**
     * @var string
     *
     * @ORM\Column(name="poster_serie", type="string", length=255)
     */
    private $posterSerie;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_serie", type="string", length=255)
     */
    private $resumeSerie;


    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Saison", mappedBy="serie", cascade={"remove"})
     */
    private $saisons;


    /**
     * @var boolean
     * @ORM\Column(name="moderation", type="boolean")
     *
     */
    private $moderation;


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
     * Set nomSerie
     *
     * @param string $nomSerie
     * @return Series
     */
    public function setNomSerie($nomSerie)
    {
        $this->nomSerie = $nomSerie;

        return $this;
    }

    /**
     * Get nomSerie
     *
     * @return string 
     */
    public function getNomSerie()
    {
        return $this->nomSerie;
    }

    /**
     * Set posterSerie
     *
     * @param string $posterSerie
     * @return Series
     */
    public function setPosterSerie($posterSerie)
    {
        $this->posterSerie = $posterSerie;

        return $this;
    }

    /**
     * Get posterSerie
     *
     * @return string 
     */
    public function getPosterSerie()
    {
        return $this->posterSerie;
    }

    /**
     * Set resumeSerie
     *
     * @param string $resumeSerie
     * @return Series
     */
    public function setResumeSerie($resumeSerie)
    {
        $this->resumeSerie = $resumeSerie;

        return $this;
    }

    /**
     * Get resumeSerie
     *
     * @return string 
     */
    public function getResumeSerie()
    {
        return $this->resumeSerie;
    }

    /**
     * Set saisons
     *
     * @param string $saisons
     * @return Series
     */
    public function setSaisons($saisons)
    {
        $this->saisons = $saisons;

        return $this;
    }

    /**
     * Get saisons
     *
     * @return string 
     */
    public function getSaisons()
    {
        return $this->saisons;
    }

    /**
     * Get moderation
     *
     * @return boolean 
     */
    public function getModeration()
    {
        return $this->moderation;
    }

    /**
     * Set moderation
     *
     * @param string $moderation
     * @return Series
     */
    public function setModeration($moderation)
    {
        $this->moderation = $moderation;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->saisons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add episode
     *
     * @param \IglesBundle\Entity\Episodes $episode
     * @return Series
     */
    public function addEpisode(\IglesBundle\Entity\Episodes $episode)
    {
        $this->episode[] = $episode;

        return $this;
    }


    /**
     * Remove episode
     *
     * @param \IglesBundle\Entity\Episodes $episode
     */
    public function removeEpisode(\IglesBundle\Entity\Episodes $episode)
    {
        $this->episode->removeElement($episode);
    }

    /**
     * Get episode
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Add saisons
     *
     * @param \IglesBundle\Entity\Saison $saisons
     * @return Series
     */
    public function addSaison(\IglesBundle\Entity\Saison $saisons)
    {
        $this->saisons[] = $saisons;

        return $this;
    }

    /**
     * Remove saisons
     *
     * @param \IglesBundle\Entity\Saison $saisons
     */
    public function removeSaison(\IglesBundle\Entity\Saison $saisons)
    {
        $this->saisons->removeElement($saisons);
    }
}
