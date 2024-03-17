<?php
namespace Acme\ProductModule\Block;
use Magento\Framework\View\Element\Template;

class ProductList extends Template
{    
    protected function _prepareLayout()
    {
        $this->setMessage('Hello Again World');
    }
}