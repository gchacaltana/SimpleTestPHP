<?php

/**
 * Invoice Class
 *
 * @author Gonzalo Chacaltana <gchacaltanab@outlook.com>
 * @category class
 */
class Invoice {

    private $_subtotal;
    private $_tax;
    private $_taxRate;
    private $_total;
    private $_discountRate;
    private $_discountAmount;

    public function getSubtotal() {
        return $this->_subtotal;
    }

    public function setSubtotal($subtotal) {
        $this->_subtotal = $subtotal;
    }

    public function getTax() {
        return $this->_tax;
    }

    public function getTaxRate() {
        return $this->_taxRate;
    }

    public function setTaxRate($taxRate) {
        $this->_taxRate = $taxRate;
    }

    public function setTax($tax) {
        $this->_tax = $tax;
    }

    public function getTotal() {
        return $this->_total;
    }

    public function setTotal($total) {
        $this->_total = $total;
    }

    public function getDiscountRate() {
        return $this->_discountRate;
    }

    public function setDiscountRate($discountRate) {
        $this->_discountRate = $discountRate;
    }

    public function getDiscountAmount() {
        return $this->_discountAmount;
    }

    public function setDiscountAmount($discountAmount) {
        $this->_discountAmount = $discountAmount;
    }

    public function __construct($subtotal, $taxRate = NULL, $discountRate = NULL) {
        $this->setSubtotal($subtotal);
        $this->setDiscountRate($discountRate);
        if (is_null($taxRate))
            $this->setTaxRate(18);
        $this->calculate();
    }

    /**
     * Calculate values invoice.
     * @access private
     */
    private function calculate() {
        if (is_numeric($this->getSubtotal())) {
            (float) $taxAmount = $this->getSubtotal() * ($this->getTaxRate() / 100);
            $this->setTax($taxAmount);
            $this->setDiscountAmount(0);
            if (!is_null($this->getDiscountRate()) && is_numeric($this->getDiscountRate())) {
                (float) $discountAmount = $this->getSubtotal() * ($this->getDiscountRate() / 100);
                $this->setDiscountAmount($discountAmount);
            }
            (float) $total = $this->getSubtotal() + $this->getTax() - $this->getDiscountAmount();
            $this->setTotal($total);
            return TRUE;
        }
        return FALSE;
    }

}
