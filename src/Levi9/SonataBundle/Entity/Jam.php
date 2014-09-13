<?php

namespace Levi9\SonataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Levi9\SonataBundle\Entity\JamType;
use Levi9\SonataBundle\Entity\JamYear;

/**
 * Jam
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Jam
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
     * @ORM\Column(name="comment", type="text", nullable=true)
     * @var string|null
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="Levi9\SonataBundle\Entity\JamType", inversedBy="jam")
     * @ORM\JoinColumn(nullable=false)
     * @var JamType
     */
    protected $type;

    /**
     * @ORM\ManyToOne(targetEntity="Levi9\SonataBundle\Entity\JamYear", inversedBy="jam")
     * @ORM\JoinColumn(nullable=false)
     * @var JamYear
     */
    protected $year;

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
     * Set comment
     *
     * @param string|null $comment
     * @return Jam
     */
    public function setComment($comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param JamType $type
     * @return Jam
     */
    public function setType(JamType $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return JamType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param JamYear $year
     * @return Jam
     */
    public function setYear(JamYear $year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return JamYear
     */
    public function getYear()
    {
        return $this->year;
    }


}
