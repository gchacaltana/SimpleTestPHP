<?php

/**
 * Clase para testear OperacionesMatematicas Class
 *
 * @author Gonzalo Chacaltana B <gchacaltanab@gmail.com>
 * @name OperacionesMatematicasTestCase
 * @category UnitTestCase
 */
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once(dirname(__FILE__) . '/OperacionesMatematicas.php');

class OperacionesMatematicasTestCase extends UnitTestCase
{

    public $obj;

    public function setUp()
    {
        $this->obj = new OperacionesMatematicas(18, 6);
    }

    function testInputParamConstruct()
    {
        $this->assertTrue(is_numeric($this->obj->getA()));
        $this->assertTrue(is_numeric($this->obj->getB()));
    }

    function testSumar()
    {
        $this->assertTrue(is_numeric($this->obj->sumar()));
    }

    function testMultiplicar()
    {
        $this->assertEqual(108, $this->obj->multiplicar());
    }

    /**
     * 
     */
    function testDividir()
    {
        $this->assertEqual(3, $this->obj->dividir());
    }

}