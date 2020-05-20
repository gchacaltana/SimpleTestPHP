<?php

/**
 * InvoiceTest Class
 *
 * @author Gonzalo Chacaltana <gchacaltanab@outlook.com>
 * @name InvoiceTestCase
 * @category UnitTestCase
 */
require_once(dirname(__FILE__) . 'simpletest/autorun.php');
require_once(dirname(__FILE__) . '/Invoice.php');

class InvoiceTestCase extends UnitTestCase {

    public $obj;

    public function setUp() {
        $this->obj = new Invoice(2000, NULL, 5);
    }

    function testSubTotal() {
        $this->assertTrue(is_numeric($this->obj->getSubtotal()), "Se esperaba un valor numérico");
    }

    function testTaxDefault() {
        $this->assertEqual(360, $this->obj->getTax());
    }

    function testTotalAmount() {
        $this->assertEqual(2260, $this->obj->getTotal());
    }

    function testTaxAmount() {
        $this->assertEqual(100, $this->obj->getDiscountAmount());
    }

}
