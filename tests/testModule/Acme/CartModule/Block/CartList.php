<?php
namespace Acme\CartModule\Block;
use Magento\Framework\View\Element\Template;

class CartList extends Template
{    
    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
    }
}