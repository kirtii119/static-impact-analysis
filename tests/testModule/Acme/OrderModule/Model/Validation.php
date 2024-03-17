<?php
namespace Acme\OrderModule\Model;
use Acme\OrderModule\Model\Customer;

class Validation
{
/**
 * @return Customer
 * 
 */
    public function getCustomerObject()
    {
        $custObject = new Customer();
        return $custObject;
    }

}