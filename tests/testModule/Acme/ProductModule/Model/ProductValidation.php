<?php
namespace Acme\ProductModule\Model;

 use  Acme\ProductModule\Model\ProductTemplate;
 use Acme\OrderModule\Model\Customer;
 use Acme\OrderModule\Model\Validation;

class ProductValidation extends Validation
{

    public function validPayment()
    {

        $object = new ProductTemplate();
        $custObject = parent :: getCustomerObject();

        return $custObject->getCustomerBySessionId($object);

    }
}