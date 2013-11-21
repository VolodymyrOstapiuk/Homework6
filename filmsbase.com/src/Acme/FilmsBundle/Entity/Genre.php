<?php


namespace Acme\FilmsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="genre")
*/
class Genre {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**@ORM\ManyToMany(targetEntity="Film", inversedBy="genres")
     * @ORM\JoinTable(name="films_genres")
     */
    protected $films;
    /**@ORM\Column(type="string",length="100")*/
    protected $tittle;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->films=new ArrayCollection();
    }
    /**
     * Set films
     *
     * @param ArrayCollection $films
     * @return $this
     */
    public function setFilms(ArrayCollection $films)
    {
        $this->films=$films;
        return $this;
    }
    /**
     * Add film
     *
     * @param Film $film
     * @return $this
     */
    public function addFilm(Film $film)
    {
        $this->films->add($film);
    }
    /**
     * Get films
     *
     * @return ArrayCollection
     */
    public function getFilms()
    {
      return $this->films;
    }
    /**
     * Set tittle
     *
     * @param string $tittle
     * @return $this
     */
    public function setTittle($tittle)
    {
        $this->tittle=$tittle;
        return $this;
    }
    /**
     * Get tittle
     *
     *
     * @return string
     */
    public function getTittle()
    {
     return $this->tittle;
    }
    /**
     * Get id
     *
     *
     * @return integer
     */
    public function getId()
    {
     return $this->id;
    }
} 