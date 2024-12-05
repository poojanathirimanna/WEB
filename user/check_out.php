<?php
session_start();
require '../connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../signin/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch cart items for the current user
$stmt = $conn->prepare("SELECT products.name, products.price, cart.quantity
                        FROM cart
                        JOIN products ON cart.product_id = products.id
                        WHERE cart.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items = $stmt->get_result();

$total_price = 0;
while ($item = $cart_items->fetch_assoc()) {
    $total_price += $item['price'] * $item['quantity'];
}

// Handle order submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    
    // Insert the order into the orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total_price, address, payment_method) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die('Error in SQL statement: ' . $conn->error);
    }
    
    $stmt->bind_param("idss", $user_id, $total_price, $address, $payment_method);
    $stmt->execute();
    
    // Clear the cart after placing the order
    $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    
    // Redirect to a confirmation page
    header("Location: order_confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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

    <!-- Checkout Section -->
    <section class="bg-black py-4">
        <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
            <h2 class="inline-block border-b-4 border-[#F7941D]">Checkout</h2>
        </div>

        <!-- Review Order -->
        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Review Your Order</h2>

            <table class="min-w-full bg-gray-800 text-white rounded-lg shadow-lg p-6">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-6 text-left">Product Name</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-left">Quantity</th>
                        <th class="py-3 px-6 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Reset the pointer and loop through the items again to display them
                    $cart_items->data_seek(0); 
                    while ($item = $cart_items->fetch_assoc()): ?>
                    <tr class="border-b hover:bg-gray-700">
                        <td class="py-3 px-6"><?php echo htmlspecialchars($item['name']); ?></td>
                        <td class="py-3 px-6"><?php echo number_format($item['price'], 2); ?> LKR</td>
                        <td class="py-3 px-6"><?php echo $item['quantity']; ?></td>
                        <td class="py-3 px-6"><?php echo number_format($item['price'] * $item['quantity'], 2); ?> LKR</td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr class="border-t-2 border-white">
                        <td class="py-3 px-6 text-right" colspan="3"><strong>Total Price:</strong></td>
                        <td class="py-3 px-6"><?php echo number_format($total_price, 2); ?> LKR</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Checkout Form -->
        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl text-white font-bold mb-4">Enter Shipping and Payment Details</h2>
            <form action="check_out.php" method="POST">
                <div class="flex flex-col mb-4">
                    <label for="address" class="text-lg font-semibold">Shipping Address:</label>
                    <textarea name="address" id="address" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D] text-black" placeholder="Enter your shipping address"></textarea>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="payment_method" class="text-lg font-semibold text-black mb-2">Payment Method:</label>
                         <select name="payment_method" id="payment_method" required class="border p-3 rounded-md bg-black text-white focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                            <option value="Credit Card">Credit Card</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Cash on Delivery">Cash on Delivery</option>
                        </select>
                </div>

                <button type="submit" name="checkout" class="bg-[#F7941D] text-white px-6 py-3 rounded-md hover:bg-orange-600 transition duration-300">Place Order</button>
            </form>
        </div>
    </section>
</body>
</html>
