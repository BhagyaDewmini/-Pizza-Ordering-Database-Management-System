<?php
session_start();
// Assuming you have a database connection established
// Replace the following with your actual database connection code

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeAreAwesomedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission


    // Perform database insert here
    // You need to write the SQL query based on your database schema

    // Example query (replace with actual query)
    // Insert customer (for example purposes)
$sqlInsertCustomer = "INSERT INTO Customers (FirstName, LastName, Email, Phone) VALUES ('John', 'Doe', 'john.doe@example.com', '123456789')";
$conn->query($sqlInsertCustomer);

// Insert order
$sqlInsertOrder = "INSERT INTO Orders (CustomerID, OrderDate, OrderType, TotalAmount) VALUES (1, NOW(), 'Dine-in', 0.00)";
$conn->query($sqlInsertOrder);

// Get the OrderID of the newly inserted order
$lastOrderID = $conn->insert_id;

// Insert pizza details for the order
$sqlInsertPizza = "INSERT INTO PizzasInOrder (OrderID, PizzaType, PizzaSize, Topping1, Topping2, Topping3) VALUES ('$lastOrderID', 'Traditional Italiano', 'Personal', '', '', '')";
$conn->query($sqlInsertPizza);


echo "Order placed successfully!";
header("Location:order.html");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WeAreAwesomedb";

$conn->close();
?>