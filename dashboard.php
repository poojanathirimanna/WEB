<?php
session_start();

// Check if the user is logged in and has the admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Get the logged-in admin's name from the session
$admin_name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS -->
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-md">
        <div class="text-2xl font-bold">Admin Dashboard</div>

        <!-- Display logged-in admin's name and Logout button -->
        <div class="flex items-center space-x-4">
            <span>Welcome, <?php echo htmlspecialchars($admin_name); ?>!</span>
            <a href="../WEB/signin/logout.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
        </div>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-4 space-y-6">
            <h3 class="text-xl font-bold px-2 py-4">Admin Panel</h3>
            <!-- Sidebar Navigation -->
            <a href="../WEB/admin_order.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Orders</a>
            <a href="../WEB/admin_products.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Products</a>
            <a href="../WEB/admin_customers.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Customers</a>
            <a href="../WEB/admin_categories.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Categories</a>
        </aside>

        <!-- Dashboard Content -->
        <main class="p-6 flex-grow">
            <!-- Cards Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Card 1: Total Users -->
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <!-- <h3 class="text-xl font-bold text-gray-800">Total Users</h3> -->
                    <!-- <p class="text-4xl text-gray-700 mt-4">1,234</p> -->
                </div>

                <!-- Card 2: Total Products -->
                <!-- <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-bold text-gray-800">Total Products</h3>
                    <p class="text-4xl text-gray-700 mt-4">567</p>
                </div> -->

                <!-- Card 3: Total Orders -->
                <!-- <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-bold text-gray-800">Total Orders</h3>
                    <p class="text-4xl text-gray-700 mt-4">78</p>
                </div> -->

                <!-- Card 4: Revenue -->
                <!-- <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    <h3 class="text-xl font-bold text-gray-800">Revenue</h3>
                    <p class="text-4xl text-gray-700 mt-4">$9,876</p>
                </div> -->
            </div>

            <!-- Table Section: Recent Orders -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                <!-- <h2 class="text-2xl font-bold text-gray-800 mb-4">Recent Orders</h2>
                <table class="w-full text-left bg-gray-100 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="p-3">Order ID</th>
                            <th class="p-3">Customer</th>
                            <th class="p-3">Total</th>
                            <th class="p-3">Status</th>
                            <th class="p-3">Date</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <!-- <td class="p-3">#1234</td>
                            <td class="p-3">John Doe</td>
                            <td class="p-3">$100</td>
                            <td class="p-3 text-green-600">Completed</td>
                            <td class="p-3">2024-09-19</td> -->
                        </tr>
                        <tr class="border-b">
                            <!-- <td class="p-3">#1235</td>
                            <td class="p-3">Jane Doe</td>
                            <td class="p-3">$150</td>
                            <td class="p-3 text-yellow-600">Pending</td>
                            <td class="p-3">2024-09-18</td> -->
                        </tr>
                        <tr class="border-b">
                            <!-- <td class="p-3">#1236</td>
                            <td class="p-3">Mark Smith</td>
                            <td class="p-3">$75</td>
                            <td class="p-3 text-red-600">Cancelled</td>
                            <td class="p-3">2024-09-17</td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</body>
</html>
