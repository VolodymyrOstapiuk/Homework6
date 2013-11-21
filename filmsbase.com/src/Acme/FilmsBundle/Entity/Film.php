<?php

namespace Acme\FilmsBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="film")
     */
class Film
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $description;

    /**
     * @ORM\Column(type="text",length=20)
     */
    protected $quality;
    /**
     * @ORM\ManyToMany(targetEntity="Genre",inversedBy="films")
     * @ORM\JoinTable(name="films_genres")
     *
     */
    protected $genres;
    /**
     * @ORM\ManyToMany(targetEntity="Actor",inversedBy="films")
     * @ORM\JoinTable(name="films_actors")
     */
    protected $actors;

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
     * @return Film
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
     * Set description
     *
     * @param string $description
     * @return Film
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

    /**
     * Set quality
     *
     * @param string $quality
     * @return Film
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Get quality
     *
     * @return string
     */
    public function getQuality()
    {
        return $this->quality;
    }
    /**
     * Get genre
     *
     * @return ArrayCollection
     */
    public function getGenres()
    {
        return $this->genres;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new ArrayCollection();
        $this->genres = new ArrayCollection();
    }
    /**
     * Set genres
     *
     * @param ArrayCollection $genres
     * @return $this
     */
    public function setGenres(ArrayCollection $genres)
    {
        $this->genres=$genres;
        return $this;
    }
    /**
     * Add genre
     *
     * @param Genre $genre
     * @return $this
     */
    public function addGenre(Genre $genre)
    {
        $genre->addFilm($this);
        $this->genres->add($genre);
    }
    /**
     * Set actors
     *
     * @param ArrayCollection $actors
     * @return $this
     */

    public function setActors(ArrayCollection $actors)
    {
        $this->actors=$actors;
        return $this;
    }
    /**
     * Add actor
     *
     * @param Actor $actor
     * @return $this
     */
    public function addActor(Actor $actor)
    {
        $actor->addFilm($this);
        $this->actors->add($actor);
    }

    /**
     * Get actors
     *
     * @return ArrayCollection
     */
    public function getActors()
    {
        return $this->actors;
    }
}