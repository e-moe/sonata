<?php

namespace Levi9\SonataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Levi9\SonataBundle\Entity\Jam;

/**
 * JamYear
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class JamYear
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
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @ORM\OneToMany(targetEntity="Levi9\SonataBundle\Entity\Jam", mappedBy="year")
     * @var Jam[]
     */
    protected $jam;

    public function __construct()
    {
        $this->jam = new ArrayCollection();
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
     * Set year
     *
     * @param integer $year
     * @return JamYear
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return Jam[]
     */
    public function getJam()
    {
        return $this->jam;
    }
}
