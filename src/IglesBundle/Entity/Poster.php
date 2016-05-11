<?php
namespace IglesBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Poster
 *
 * @ORM\Table(name="poster")
 * @ORM\Entity(repositoryClass="IglesBundle\Repository\PosterRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Poster
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    protected $name;
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $posterFile;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $path;


    public function __construct($url = null)
    {
        if ($url){
            // Ouvre un fichier pour lire un contenu existant
            $current = file_get_contents($url);
            // Écrit le résultat dans le fichier
            //récupérer le format jpeg
            $fileName = uniqid().'.jpeg';
            $posterFile = $this->getUploadRootDir()."/".$fileName;
            file_put_contents($posterFile, $current);
            $this->path = $fileName;
            $this->name = $url;
        }
    }
    /**
     * Sets file.
     *
     * @param UploadedFile $posterFile
     */
    public function setPosterFile(UploadedFile $posterFile = null)
    {
        $this->file = $posterFile;

        if (isset($this->path)) {
            // Stocke le vieux nom pour le supprimer après la mise à jour
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }
    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getPosterFile()
    {
        return $this->posterFile;
    }
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }
    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }
    protected function getUploadRootDir()
    {
        // Le chemin absolu de l'Upload
        // les document sont sauvegardés
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir()
    {

        return 'uploads';
    }
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {

        if (null === $this->file) {
            return;
        }
        $this->name = $this->file->getClientOriginalName();
        if ($this->path != $this->file->getClientOriginalName()) {
            $this->path = uniqid().'.'.$this->file->getClientOriginalExtension();
        }
    }
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {

        if (null === $this->file) {
            return;
        }
        $file_name = $this->file->getClientOriginalName();
        // la méthode « move » prend comme arguments le répertoire cible et
        // le nom de fichier cible où le fichier doit être déplacé
        if (!file_exists($this->getUploadRootDir())) {
            mkdir($this->getUploadRootDir(), 0775, true);
        }
        $this->file->move(
            $this->getUploadRootDir(), $this->path
        );
        $this->file = null;
    }
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
     * Set name
     *
     * @param string $name
     *
     * @return Poster
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set path
     *
     * @param string $path
     *
     * @return Poster
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
    public function getUrl(){
        return $this->getWebPath();
    }



}