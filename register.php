<?php
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
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $Dateofbirthday = $_POST["dateofbirthday"];

    // Insert user data into the database
    $sql = "INSERT INTO users (username, password,dateofbirthday) VALUES ('$username', '$password','$Dateofbirthday')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("Location:home.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>