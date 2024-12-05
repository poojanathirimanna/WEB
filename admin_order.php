<?php
session_start();

// Check if the admin is logged in and authorized
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Include database connection
require 'connect.php';

// Fetch orders from the database
$query = "SELECT orders.id, users.name, orders.total_price, orders.address, orders.payment_method 
          FROM orders 
          JOIN users ON orders.user_id = users.id";

if ($stmt = $conn->prepare($query)) {
    $stmt->execute();
    $orders = $stmt->get_result();
} else {
    echo "Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">Admin Dashboard</div>
        <a href="../WEB/signin/logout.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-60 bg-gray-800 text-white h-screen p-4">
            <nav class="space-y-4">
                <a href="admin_order.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Orders</a>
                <a href="admin_products.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Products</a>
                <a href="admin_customers.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Customers</a>
                <a href="admin_categories.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Categories</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="p-6 flex-grow">
            <!-- Page Title -->
            <h1 class="text-3xl font-bold mb-6">View Orders</h1>

            <!-- Orders Table -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left text-white">Order ID</th>
                            <th class="py-3 px-6 text-left text-white">Name</th>
                            <th class="py-3 px-6 text-left text-white">Total Price</th>
                            <th class="py-3 px-6 text-left text-white">Address</th>
                            <th class="py-3 px-6 text-left text-white">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php while ($order = $orders->fetch_assoc()) : ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-6 text-white"><?php echo $order['id']; ?></td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($order['name']); ?></td>
                                <td class="py-3 px-6 text-white"><?php echo number_format($order['total_price'], 2); ?> LKR</td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($order['address']); ?></td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($order['payment_method']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
