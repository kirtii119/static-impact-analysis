<?php

namespace Acme\PaymentModule\Model;

use Acme\PaymentModule\Model\TransactionInterface;
class PaymentTemplate implements TransactionInterface {
    private $orderTotal = 0; // Variable to store the total price of the order

    public function addToCart($item, $quantity) {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function removeFromCart($item) {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function updateCartQuantity($item, $newQuantity) {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function getCartTotal() {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function placeOrder() {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function processPayment($amount) {
        // Process payment for the order
        // In a real implementation, this method would interact with a payment gateway to process the payment
        // For demonstration purposes, we're just returning a success message here
        return "Payment processed successfully for amount: $" . $amount;
    }

    public function cancelOrder($orderID) {
        // This method is not applicable in the context of payment
        // Implement as required by the specific use case
    }

    public function getOrderId() {
        return "order1";
    }

    public function getCustomerName(){
        return "Geet";
    }
}


