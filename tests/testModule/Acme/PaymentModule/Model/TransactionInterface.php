<?php
namespace Acme\PaymentModule\Model;

interface TransactionInterface {

    public function getCustomerName();

    // Add item to the shopping cart
    public function addToCart($item, $quantity);

    // Remove item from the shopping cart
    public function removeFromCart($item);

    // Update quantity of an item in the shopping cart
    public function updateCartQuantity($item, $newQuantity);

    // Get the total price of items in the shopping cart
    public function getCartTotal();

    // Place an order using items from the shopping cart
    public function placeOrder();

    // Process payment for the order
    public function processPayment($amount);

    // Cancel an order
    public function cancelOrder($orderID);
}

