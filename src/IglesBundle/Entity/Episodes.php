<?php

namespace IglesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="poster_episode", type="string", length=255)
     */
    private $posterEpisode;

    /**
     * @var string
     *
     * @ORM\Column(name="resume_episode", type="string", length=255)
     */
    private $resumeEpisode;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_episode", type="text")
     */
    private $numeroEpisode;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Saison", inversedBy="episodes")
     */
    private $saison;


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
     * Set posterEpisode
     *
     * @param string $posterEpisode
     * @return Episodes
     */
    public function setPosterEpisode($posterEpisode)
    {
        $this->posterEpisode = $posterEpisode;

        return $this;
    }

    /**
     * Get posterEpisode
     *
     * @return string 
     */
    public function getPosterEpisode()
    {
        return $this->posterEpisode;
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
}
