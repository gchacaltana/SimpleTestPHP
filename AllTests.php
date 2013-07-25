<?php

/**
 * AllTests Class
 *
 * @author Gonzalo Chacaltana B <gchacaltanab@gmail.com>
 * @name AllTests
 * @category TestSuite
 */
require_once('simpletest/autorun.php');

class AllTests extends TestSuite
{

    function AllTests()
    {
        $this->TestSuite('Correr todos los test');
        $this->addFile('InvoiceTest.php');
        $this->addFile('OperacionesMatematicasTest.php');
    }

}