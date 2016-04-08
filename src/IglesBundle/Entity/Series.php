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
     * @ORM\OneToMany(targetEntity="Episodes", mappedBy="serie", cascade={"remove"})
     */
    private $episode;


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
     * Set episode
     *
     * @param string $episode
     * @return Series
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return string 
     */
    public function getEpisode()
    {
        return $this->episode;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episode = new \Doctrine\Common\Collections\ArrayCollection();
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
}
