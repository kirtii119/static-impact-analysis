<?php
namespace Acme\ProductModule\Controller\Product;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Acme\ProductModule\Model\ProductValidation;

class Detail extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $obj = new ProductValidation();
        echo $obj->validPayment();
        
    }
}