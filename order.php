<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weareawesomedb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Billing Address
    $fullname = $_POST['firstname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    // Payment Information
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

    // Insert data into the database (assuming you have a table named 'paymentdetails')
    $sql = "INSERT INTO payment details (fullname, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv)
            VALUES ('$fullname', '$email', '$address', '$city', '$state', '$zip', '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";

if ($conn->query($sql) === TRUE) {
    echo "order successful";
    header("Location:logout.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>