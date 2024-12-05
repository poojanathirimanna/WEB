<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../signin/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="../public/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-gray-800 text-white p-4 flex items-center justify-between shadow-md">
        <div class="text-2xl font-bold"> <a href="../index.php">PST TECH</a></div>
        <nav class="space-x-6 flex-1 text-center">
            <a href="./services.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Services</a>
            <a href="./contact.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Contact</a>
        </nav>
        <div class="flex space-x-4 items-center">
            <a href="../signin/login.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
        </div>
    </header>

    <!-- Order Confirmation -->
    <section class="bg-black py-4">
        <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
            <h2 class="inline-block border-b-4 border-[#F7941D]">Order Confirmation</h2>
        </div>

        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6 text-center">
            <h3 class="text-2xl font-bold mb-4">Thank you for your order!</h3>
            <p>Your order has been placed successfully.</p>
            <p>You will receive an email confirmation shortly.</p>
            <a href="../index2.php" class="bg-[#F7941D] text-white px-4 py-2 rounded-md mt-6 inline-block hover:bg-orange-600 transition duration-300">Return to Home</a>
        </div>
    </section>
</body>
</html>
