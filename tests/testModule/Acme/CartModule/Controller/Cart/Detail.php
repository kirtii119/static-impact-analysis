<?php
namespace Acme\CartModule\Controller\Cart;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Acme\CartModule\Model\CartValidation;

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
        $obj = new CartValidation();
        echo $obj->validPayment();
        
    }
}