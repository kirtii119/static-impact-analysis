<?php
namespace Acme\OrderModule\Model;


use Acme\PaymentModule\Model\Transaction;
use Acme\PaymentModule\Model\TransactionInterface;

class OrderTemplate implements TransactionInterface {
    private $cart = array(); // Array to store items in the shopping cart
    private $orderTotal = 0; // Variable to store the total price of the order

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
        // Get the total price of items in the shopping cart
        $this->orderTotal = 0;
        foreach ($this->cart as $item => $quantity) {
            // Assuming price of each item is stored in an associative array named $itemPrices
            $this->orderTotal += $itemPrices[$item] * $quantity;
        }
        return $this->orderTotal;
    }

    public function placeOrder() {
        // Place an order using items from the shopping cart
        // In a real implementation, this method would likely interact with a database or external service
        // to store the order details and update inventory
        // For demonstration purposes, we're just returning a success message here
        return "Order placed successfully!";
    }

    public function processPayment($amount) {
        // Process payment for the order
        // In a real implementation, this method would interact with a payment gateway to process the payment
        // For demonstration purposes, we're just returning a success message here
        return "Payment processed successfully for amount: $" . $amount;
    }

    public function cancelOrder($orderID) {
        // Cancel an order
        // In a real implementation, this method would likely interact with a database or external service
        // to mark the order as canceled and potentially refund the payment
        // For demonstration purposes, we're just returning a success message here
        return "Order with ID: $orderID canceled successfully!";
    }


    public function getOrderId() {
        return "testOrderId";
    }

    public function getCustomerName(){
        return "Kashish";
    }

}


