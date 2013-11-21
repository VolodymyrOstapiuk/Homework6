<?php

namespace Acme\FilmsBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 *  Actor
 *  @ORM\Entity
 *  @ORM\Table(name="actor")
 *
 */
class Actor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;
    /**@ORM\ManyToMany (targetEntity="Film", mappedBy="actors")
     *
     */
    protected $films;
    /**@ORM\Column(type="string",length=40)*/
    protected $name;
    public function __construct()
    {
     $this->films=new ArrayCollection();
    }
    /**
     * @param ArrayCollection $films
     * @return $this
    */
    public function setFilms(ArrayCollection $films)
    {
        $this->films=$films;
        return $this;
    }
    /**
     * @param Film film
     * @return $this
     *
    */
    public function addFilm(Film $film)
    {
        $this->films->add($film);
    }
    /**@return ArrayCollection*/
    public function getFilms()
    {
        return $this->films;
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
     * @param string $name
     * @return $this
    */
    public function setName($name)
    {
        $this->name=$name;
        return $this;
    }
    /**@return string*/
    public function getName()
    {
        return $this->name;
    }
}