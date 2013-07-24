<?php

/**
 * Clase operaciones matemáticas, para ejemplo SimpleTest PHP.
 *
 * @author Gonzalo Chacaltana B <gchacaltanab@gmail.com>
 * @name OperacionesMatematicas
 * @category class
 */
class OperacionesMatematicas
{

    private $a;
    private $b;

    public function getA()
    {
        return $this->a;
    }

    public function setA($a)
    {
        $this->a = $a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function setB($b)
    {
        $this->b = $b;
    }

    /**
     * @param int $a, primer valor numérico.
     * @param int $b, segundo valor numérico.
     * @access public
     */
    public function __construct($a, $b)
    {
        $this->setA($a);
        $this->setB($b);
    }

    /**
     * @access public
     * @return int suma
     */
    public function sumar()
    {
        return $this->getA() + $this->getB();
    }

    /**
     * @access public
     * @return int resta
     */
    public function restar()
    {
        return $this->getA() - $this->getB();
    }

    /**
     * @access public
     * @return int Multiplicación
     */
    public function multiplicar()
    {
        return $this->getA() * $this->getB();
    }

    /**
     * @access public
     * @return int Division
     */
    public function dividir()
    {
        if ($this->getB() != 0) {
            return $this->getA() / $this->getB();
        }
        return "No se puede dividir entre cero";
    }

}