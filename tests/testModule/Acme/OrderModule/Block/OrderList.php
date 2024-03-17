<?php
namespace Acme\OrderModule\Block;
use Magento\Framework\View\Element\Template;

class OrderList extends Template
{    
    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
    }
}