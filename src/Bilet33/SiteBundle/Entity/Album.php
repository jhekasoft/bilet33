<?php

namespace Bilet33\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity(repositoryClass="Bilet33\SiteBundle\Entity\AlbumRepository")
 */
class Album
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

    /**
     * @var integer
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="cover_file", type="string", length=255)
     */
    private $coverFile;

    /**
     * @var string
     *
     * @ORM\Column(name="back_file", type="string", length=255)
     */
    private $backFile;

    /**
     * @var string
     *
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Audio", mappedBy="album")
     * @ORM\OrderBy({"number" = "ASC"})
     */
    protected $audios;


    public function __construct()
    {
        $this->audios = new ArrayCollection();
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
     * Set slug
     *
     * @param string $slug
     * @return Album
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Album
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Album
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Album
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set coverFile
     *
     * @param string $coverFile
     * @return Album
     */
    public function setCoverFile($coverFile)
    {
        $this->coverFile = $coverFile;

        return $this;
    }

    /**
     * Get coverFile
     *
     * @return string 
     */
    public function getCoverFile()
    {
        return $this->coverFile;
    }

    /**
     * Add audios
     *
     * @param \Bilet33\SiteBundle\Entity\Audio $audios
     * @return Album
     */
    public function addAudio(\Bilet33\SiteBundle\Entity\Audio $audios)
    {
        $this->audios[] = $audios;

        return $this;
    }

    /**
     * Remove audios
     *
     * @param \Bilet33\SiteBundle\Entity\Audio $audios
     */
    public function removeAudio(\Bilet33\SiteBundle\Entity\Audio $audios)
    {
        $this->audios->removeElement($audios);
    }

    /**
     * Get audios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAudios()
    {
        return $this->audios;
    }

    /**
     * Set backFile
     *
     * @param string $backFile
     * @return Album
     */
    public function setBackFile($backFile)
    {
        $this->backFile = $backFile;

        return $this;
    }

    /**
     * Get backFile
     *
     * @return string 
     */
    public function getBackFile()
    {
        return $this->backFile;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Album
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Album
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
}
