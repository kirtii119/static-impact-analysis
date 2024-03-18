<?php
namespace Acme\CartModule\Model;

use Acme\OrderModule\Model\Validation;
 use  Acme\CartModule\Model\CartTemplate;
 use Acme\OrderModule\Model\Customer;
 
class CartValidation extends Validation
{

    public function validPayment()
    {

        $object = new CartTemplate();
        $custObject= parent :: getCustomerObject();

        return $custObject->getCustomer($object);

    }
}