<?php
namespace Acme\OrderModule\Controller\Order;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Acme\OrderModule\Model\OrderValidation;

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
        $obj = new OrderValidation();
        echo $obj->validPayment();
    }
}