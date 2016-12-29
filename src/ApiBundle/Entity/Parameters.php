<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiBundle\Model\ParametersInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Parameters
 *
 * @ORM\Table(name="parameters")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ParametersRepository")
 */
class Parameters implements ParametersInterface
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
     * @var bool
     *
     * @ORM\Column(name="A", type="boolean")
     * @Assert\NotNull()
     */
    private $a;

    /**
     * @var bool
     *
     * @ORM\Column(name="B", type="boolean")
     * @Assert\NotNull()
     */
    private $b;

    /**
     * @var bool
     *
     * @ORM\Column(name="C", type="boolean")
     * @Assert\NotNull()
     */
    private $c;

    /**
     * @var int
     *
     * @ORM\Column(name="D", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $d;

    /**
     * @var int
     *
     * @ORM\Column(name="E", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $e;

    /**
     * @var int
     *
     * @ORM\Column(name="F", type="integer", nullable=false)
     * @Assert\NotNull()
     */
    private $f;

    /**
     * @var int
     *
     * @ORM\Column(name="X", type="string", columnDefinition="enum('S', 'R', 'T')", nullable=true)
     */
    private $x;

    /**
     * @var int
     *
     * @ORM\Column(name="Y", type="float", nullable=true)
     */
    private $y;

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
     * Set a
     *
     * @param boolean $a
     *
     * @return Parameters
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return bool
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set b
     *
     * @param boolean $b
     *
     * @return Parameters
     */
    public function setB($b)
    {
        $this->b = $b;

        return $this;
    }

    /**
     * Get b
     *
     * @return bool
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * Set c
     *
     * @param boolean $c
     *
     * @return Parameters
     */
    public function setC($c)
    {
        $this->c = $c;

        return $this;
    }

    /**
     * Get c
     *
     * @return bool
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Set d
     *
     * @param integer $d
     *
     * @return Parameters
     */
    public function setD($d)
    {
        $this->d = $d;

        return $this;
    }

    /**
     * Get d
     *
     * @return int
     */
    public function getD()
    {
        return $this->d;
    }

    /**
     * Set e
     *
     * @param integer $e
     *
     * @return Parameters
     */
    public function setE($e)
    {
        $this->e = $e;

        return $this;
    }

    /**
     * Get e
     *
     * @return int
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * Set f
     *
     * @param integer $f
     *
     * @return Parameters
     */
    public function setF($f)
    {
        $this->f = $f;

        return $this;
    }

    /**
     * Get f
     *
     * @return int
     */
    public function getF()
    {
        return $this->f;
    }

    /**
     * Set x
     *
     * @param float $x
     *
     * @return Parameters
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * Get x
     *
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * Set y
     *
     * @param float $y
     *
     * @return Parameters
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * Get y
     *
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }
}

