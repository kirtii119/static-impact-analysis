<?php
namespace Acme\PaymentModule\Controller\Payment;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Acme\PaymentModule\Model\PaymentValidation;


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
        $obj = new PaymentValidation();
        echo $obj->validPayment();
    }
}