<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Artwork;

/**
 * Museum
 *
 * @ORM\Table(name="museum")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MuseumRepository")
 */
class Museum
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
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="Artwork", mappedBy="museum")
     */
    private $artworks;


    /**
     * Get id
     *
     * @return int
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
     * @return Museum
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
     * Set city
     *
     * @param string $city
     *
     * @return Museum
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artworks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artwork
     *
     * @param \AppBundle\Entity\Artwork $artwork
     *
     * @return Museum
     */
    public function addArtwork(\AppBundle\Entity\Artwork $artwork)
    {
        $this->artworks[] = $artwork;

        return $this;
    }

    /**
     * Remove artwork
     *
     * @param \AppBundle\Entity\Artwork $artwork
     */
    public function removeArtwork(\AppBundle\Entity\Artwork $artwork)
    {
        $this->artworks->removeElement($artwork);
    }

    /**
     * Get artworks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtworks()
    {
        return $this->artworks;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
