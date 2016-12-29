<?php

namespace ApiBundle\Model;

Interface ParametersInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

    /**
     * Set a
     *
     * @param boolean $a
     *
     * @return Parameters
     */
    public function setA($a);

    /**
     * Get a
     *
     * @return bool
     */
    public function getA();

    /**
     * Set b
     *
     * @param boolean $b
     *
     * @return Parameters
     */
    public function setB($b);

    /**
     * Get b
     *
     * @return bool
     */
    public function getB();

    /**
     * Set c
     *
     * @param boolean $c
     *
     * @return Parameters
     */
    public function setC($c);

    /**
     * Get c
     *
     * @return bool
     */
    public function getC();

    /**
     * Set d
     *
     * @param integer $d
     *
     * @return Parameters
     */
    public function setD($d);

    /**
     * Get d
     *
     * @return int
     */
    public function getD();

    /**
     * Set e
     *
     * @param integer $e
     *
     * @return Parameters
     */
    public function setE($e);

    /**
     * Get e
     *
     * @return int
     */
    public function getE();

    /**
     * Set f
     *
     * @param integer $f
     *
     * @return Parameters
     */
    public function setF($f);

    /**
     * Get f
     *
     * @return int
     */
    public function getF();

    /**
     * Set x
     *
     * @param float $x
     *
     * @return Parameters
     */
    public function setX($x);

    /**
     * Get x
     *
     * @return int
     */
    public function getX();

    /**
     * Set y
     *
     * @param float $y
     *
     * @return Parameters
     */
    public function setY($y);

    /**
     * Get y
     *
     * @return int
     */
    public function getY();
}
