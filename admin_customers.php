<?php
session_start();
require 'connect.php';

// Check if the admin is logged in and authorized
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Handle user deletion
if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    header("Location: admin_customers.php"); // Refresh the page after deletion
    exit();
}

// Handle user addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = $_POST['role'];

    // Insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $role);
    $stmt->execute();
    header("Location: admin_customers.php"); // Refresh the page after adding user
    exit();
}

// Fetch users from the database
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Customers</title>
    <!-- Link to Tailwind CSS -->
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
            <h1 class="text-3xl font-bold mb-6 text-white">Manage Customers</h1>

            <!-- Add New User Form -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4 text-white">Add New User</h2>
                <form action="admin_customers.php" method="POST" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="username" class="text-lg font-semibold text-white">Username :</label>
                        <input type="text" name="username" id="username" placeholder="Username" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col">
                        <label for="email" class="text-lg font-semibold text-white">Email :</label>
                        <input type="email" name="email" id="email" placeholder="Email" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="text-lg font-semibold text-white">Password :</label>
                        <input type="password" name="password" id="password" placeholder="Password" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col">
                        <label for="role" class="text-lg font-semibold text-white">Role :</label>
                        <select name="role" id="role" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" name="add_user" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add User</button>
                </form>
            </div>

            <!-- Users Table -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4 text-white">Customer List</h2>
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left text-white">User ID</th>
                            <th class="py-3 px-6 text-left text-white">Username</th>
                            <th class="py-3 px-6 text-left text-white">Email</th>
                            <th class="py-3 px-6 text-left text-white">Role</th>
                            <th class="py-3 px-6 text-left text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php while ($user = $users->fetch_assoc()) : ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-6 text-white"><?php echo $user['id']; ?></td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($user['name']); ?></td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($user['email']); ?></td>
                                <td class="py-3 px-6 text-white"><?php echo htmlspecialchars($user['role']); ?></td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="admin_edit_user.php?id=<?php echo $user['id']; ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit</a>
                                    <a href="admin_customers.php?delete=<?php echo $user['id']; ?>" class="bg-red-500 text-black px-4 py-2 rounded-md hover:bg-red-600 transition duration-300" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
