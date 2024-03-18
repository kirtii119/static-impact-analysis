<?php
namespace Acme\OrderModule\Model;

use Acme\ProductModule\Model\ProductTemplate;
use Acme\PaymentModule\Model\TransactionInterface;
class Customer {
    private $name;
    private $email;
    private $address;

    public function __construct() {
        
    }

    /**
     * @param TransactionInterface $idObj
     */

    public function getCustomer(TransactionInterface $idObj) {
        // if($idObj->getOrderId() == 'testOrderId'){
        //     return "This is test user";
        // }


        return "Name: " . $idObj->getCustomerName() . "\n";
    }

     /**
     * @param ProductTemplate $idObj
     */


    public function getCustomerBySessionId(ProductTemplate $idObj) {
        return  "Name: " . $idObj -> getCustomerNameBySessionId()."\n";
    }
}




