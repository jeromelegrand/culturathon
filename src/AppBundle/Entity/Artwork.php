<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Picture;
use AppBundle\Entity\Museum;
use AppBundle\Entity\ArtStyle;

/**
 * Artwork
 *
 * @ORM\Table(name="artwork")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtworkRepository")
 */
class Artwork
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="characteristics", type="text", nullable=true)
     */
    private $characteristics;

    /**
     * @var string
     *
     * @ORM\Column(name="junior_description", type="text", nullable=true)
     */
    private $juniorDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="standard_description", type="text", nullable=true)
     */
    private $standardDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="advanced_description", type="text", nullable=true)
     */
    private $advancedDescription;

    /**
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="artworks")
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity="Museum", inversedBy="artworks")
     */
    private $museum;

    /**
     * @ORM\ManyToOne(targetEntity="ArtStyle", inversedBy="artworks")
     */
    private $artStyle;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @ORM\Column(name="picture", type="text")
     */
    private $picture;

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
     * @return Artwork
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
     * Set characteristics
     *
     * @param string $characteristics
     *
     * @return Artwork
     */
    public function setCharacteristics($characteristics)
    {
        $this->characteristics = $characteristics;

        return $this;
    }

    /**
     * Get characteristics
     *
     * @return string
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * Set artist
     *
     * @param Artist $artist
     *
     * @return Artwork
     */
    public function setArtist(Artist $artist = null)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return \AppBundle\Entity\Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set museum
     *
     * @param Museum $museum
     *
     * @return Artwork
     */
    public function setMuseum(Museum $museum = null)
    {
        $this->museum = $museum;

        return $this;
    }

    /**
     * Get museum
     *
     * @return Museum
     */
    public function getMuseum()
    {
        return $this->museum;
    }

    /**
     * Set artStyle
     *
     * @param ArtStyle $artStyle
     *
     * @return Artwork
     */
    public function setArtStyle(ArtStyle $artStyle = null)
    {
        $this->artStyle = $artStyle;

        return $this;
    }

    /**
     * Get artStyle
     *
     * @return ArtStyle
     */
    public function getArtStyle()
    {
        return $this->artStyle;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Artwork
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Artwork
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set juniorDescription
     *
     * @param string $juniorDescription
     *
     * @return Artwork
     */
    public function setJuniorDescription($juniorDescription)
    {
        $this->juniorDescription = $juniorDescription;

        return $this;
    }

    /**
     * Get juniorDescription
     *
     * @return string
     */
    public function getJuniorDescription()
    {
        return $this->juniorDescription;
    }

    /**
     * Set standardDescription
     *
     * @param string $standardDescription
     *
     * @return Artwork
     */
    public function setStandardDescription($standardDescription)
    {
        $this->standardDescription = $standardDescription;

        return $this;
    }

    /**
     * Get standardDescription
     *
     * @return string
     */
    public function getStandardDescription()
    {
        return $this->standardDescription;
    }

    /**
     * Set advancedDescription
     *
     * @param string $advancedDescription
     *
     * @return Artwork
     */
    public function setAdvancedDescription($advancedDescription)
    {
        $this->advancedDescription = $advancedDescription;

        return $this;
    }

    /**
     * Get advancedDescription
     *
     * @return string
     */
    public function getAdvancedDescription()
    {
        return $this->advancedDescription;
    }
}
