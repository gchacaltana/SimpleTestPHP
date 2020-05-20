<?php

/**
 * AllTests Class
 *
 * @author Gonzalo Chacaltana <gchacaltanab@outlook.com>
 * @name AllTests
 * @category TestSuite
 */
require_once(dirname(__FILE__) . '/simpletest/autorun.php');

class AllTests extends TestSuite {

    function AllTests() {
        $this->TestSuite('Correr todos los test');
        $this->addFile('InvoiceTest.php');
        $this->addFile('OperacionesMatematicasTest.php');
    }

}
