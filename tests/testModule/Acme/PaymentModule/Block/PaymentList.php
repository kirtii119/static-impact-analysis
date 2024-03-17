<?php
namespace Acme\PaymentModule\Block;
use Magento\Framework\View\Element\Template;

class PaymentList extends Template
{    
    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
    }
}