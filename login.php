<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection code (modify based on your database setup)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "weareawesomedb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database
    $sql = "SELECT id, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

        // Verify the entered password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful";
            // You can store user information in session variables for future use
            $_SESSION["user_id"] = $row["id"];
            // Redirect to the home page or wherever you want
            header("Location:home.html");
            exit(); // Make sure to exit after the header
        } else {
            echo "Invalid password. Hashed Password: $hashed_password, Entered Password: $password";
        }
    } else {
        echo "Invalid username. Entered Username: $username";
    }

    $conn->close();
}
?>