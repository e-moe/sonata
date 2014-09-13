<?php

namespace Levi9\SonataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Levi9\SonataBundle\Entity\Jam;

/**
 * JamType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class JamType
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
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Levi9\SonataBundle\Entity\Jam", mappedBy="type")
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
     * Set name
     *
     * @param string $name
     * @return JamType
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
     * @return Jam[]
     */
    public function getJam()
    {
        return $this->jam;
    }


}
