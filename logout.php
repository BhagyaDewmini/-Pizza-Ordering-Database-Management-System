<?php
session_start();
if (isset($_SESSION['username'])) {
    // User is logged in, display checkout form
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <!-- Checkout form here -->
    <button onclick="Submitandlogout()">logout</button>

    <script>
        function checkout() {
            // Simulate a successful payment
            alert('Payment successful.');
            logout();
        }

        function logout() {
            // Your actual logout logic here
            session_destroy();
            location.href = "order.html";
        }
    </script>
</body>
</html>

<?php
} else {
    // User is not logged in, redirect to login page
    header("Location: home.html");
}
?>