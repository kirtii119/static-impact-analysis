<?php
namespace Acme\OrderModule\Model;

 use  Acme\OrderModule\Model\OrderTemplate;
 use Acme\OrderModule\Model\Validation;

class OrderValidation extends Validation
{

    public function validPayment()
    {
        $object = new OrderTemplate();
        

        $custObject = parent :: getCustomerObject();
    

        return $custObject->getCustomer($object);
    }
}