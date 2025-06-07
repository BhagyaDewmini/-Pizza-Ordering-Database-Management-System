<?php
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Function to sanitize user input
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Process pizza order
    if (isset($_POST['pizza_size']) && isset($_POST['topping1Select']) && isset($_POST['topping2Select']) && isset($_POST['topping3Select'])) {
        // Sanitize input
        $pizza_size = sanitize_input($_POST['pizza_size']);
        $topping1 = sanitize_input($_POST['topping1Select']);
        $topping2 = sanitize_input($_POST['topping2Select']);
        $topping3 = sanitize_input($_POST['topping3Select']);

        // Calculate total price based on pizza size and toppings
        $total_price = calculatePizzaPrice($pizza_size, $topping1, $topping2, $topping3);

        // Add pizza to the cart
        addToCart($total_price, 'Pizza Order');
    }

    // Process other food items
    // ... (similar logic for other food items)

}

// Function to calculate pizza price based on size and toppings
function calculatePizzaPrice($size, $topping1, $topping2, $topping3) {
    // Add your pricing logic here based on the selected size and toppings
    // For simplicity, a fixed price of Rs. 1200 is used
    return 1200;
}

// Function to add items to the cart
function addToCart($price, $item) {
    if (!isset($_SESSION['cartItems'])) {
        $_SESSION['cartItems'] = array();
        $_SESSION['totalPrice'] = 0;
    }

    if (!isset($_SESSION['cartItems'][$item])) {
        $_SESSION['cartItems'][$item] = array('price' => $price, 'count' => 0);
    }

    $_SESSION['cartItems'][$item]['count']++;
    $_SESSION['totalPrice'] += $price;
}
?>