<?php

/**
 * Clase de operaciones matemáticas en SimpleTest PHP.
 *
 * @author Gonzalo Chacaltana<gchacaltanab@outlook.com>
 * @name OperacionesMatematicas
 * @category class
 */
class OperacionesMatematicas {

    private $_a;
    private $_b;

    public function getA() {
        return $this->_a;
    }

    public function setA($a) {
        $this->_a = $a;
    }

    public function getB() {
        return $this->_b;
    }

    public function setB($b) {
        $this->_b = $b;
    }

    /**
     * @param int $a, primer valor numérico.
     * @param int $b, segundo valor numérico.
     * @access public
     */
    public function __construct(float $a, float $b) {
        $this->setA($a);
        $this->setB($b);
    }

    public function sumar() {
        return $this->getA() + $this->getB();
    }

    public function restar() {
        return $this->getA() - $this->getB();
    }

    public function multiplicar() {
        return $this->getA() * $this->getB();
    }

    public function dividir() {
        if ($this->getB() != 0) {
            return $this->getA() / $this->getB();
        }
        return "No se puede dividir entre cero";
    }

}
