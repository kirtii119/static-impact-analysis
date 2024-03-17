<?php
namespace Acme\ProductModule\Model;

use Acme\PaymentModule\Model\TransactionInterface;


class ProductTemplate implements TransactionInterface {
    private $cart = array(); // Array to store items in the shopping cart

    public function addToCart($item, $quantity) {
        // Add item to the shopping cart
        $this->cart[$item] = $quantity;
    }

    public function removeFromCart($item) {
        // Remove item from the shopping cart
        if (isset($this->cart[$item])) {
            unset($this->cart[$item]);
        }
    }

    public function updateCartQuantity($item, $newQuantity) {
        // Update quantity of an item in the shopping cart
        if (isset($this->cart[$item])) {
            $this->cart[$item] = $newQuantity;
        }
    }

    public function getCartTotal() {
        // This method is not applicable in the context of a shopping cart
        // Implement as required by the specific use case
    }

    public function placeOrder() {
        // This method is not applicable in the context of a shopping cart
        // Implement as required by the specific use case
    }

    public function processPayment($amount) {
        // This method is not applicable in the context of a shopping cart
        // Implement as required by the specific use case
    }

    public function cancelOrder($orderID) {
        // This method is not applicable in the context of a shopping cart
        // Implement as required by the specific use case
    }

    public function getCustomerName(){
        return "Kirti";
    }


    public function getCustomerNameBySessionId(){
        return "Kirti";
    }
}

