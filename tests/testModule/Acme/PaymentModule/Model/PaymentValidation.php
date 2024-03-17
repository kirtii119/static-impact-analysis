<?php
namespace Acme\PaymentModule\Model;
 use  Acme\PaymentModule\Model\PaymentTemplate;
 use Acme\OrderModule\Model\Customer;
 use Acme\OrderModule\Model\Validation;

class PaymentValidation extends Validation
{

    public function validPayment()
    {
        $object = new PaymentTemplate();
        $custObject = parent :: getCustomerObject();

        return $custObject->getCustomer($object);
    }
}