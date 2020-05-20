<?php

/**
 * Clase para testear OperacionesMatematicas Class
 *
 * @author Gonzalo Chacaltana <gchacaltanab@outlook.com>
 * @name OperacionesMatematicasTestCase
 * @category UnitTestCase
 */
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/OperacionesMatematicas.php');

class OperacionesMatematicasTestCase extends UnitTestCase {

    public $obj;

    public function setUp() {
        $this->obj = new OperacionesMatematicas(18, 6);
    }

    public function testInputParamConstruct() {
        $this->assertTrue(is_numeric($this->obj->getA()));
        $this->assertTrue(is_numeric($this->obj->getB()));
    }

    public function testSumar() {
        $this->assertTrue(is_numeric($this->obj->sumar()));
    }

    public function testMultiplicar() {
        $this->assertEqual(108, $this->obj->multiplicar());
    }

    public function testDividir() {
        $this->assertEqual(3, $this->obj->dividir());
    }

}
