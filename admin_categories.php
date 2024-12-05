<?php
session_start();

// Check if the user is logged in and has the admin role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Include database connection
require 'connect.php';

// Handle Add Category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->bind_param("s", $category_name);
    $stmt->execute();
    $stmt->close();
}

// Handle Delete Category
if (isset($_GET['delete'])) {
    $category_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all categories
$categories = $conn->query("SELECT * FROM categories");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center shadow-md">
        <div class="text-2xl font-bold">Admin Dashboard - Categories</div>
        <a href="../WEB/signin/logout.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white p-4 space-y-6">
            <a href="admin_order.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Orders</a>
            <a href="admin_products.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Products</a>
            <a href="admin_customers.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Customers</a>
            <a href="admin_categories.php" class="block px-4 py-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Categories</a>
        </aside>

        <!-- Main Content -->
        <main class="flex-grow p-6">
            <h2 class="text-2xl font-bold mb-6 text-white">Category Management</h2>

            <!-- Add Category Form -->
            <div class="mb-6">
                <form action="admin_categories.php" method="POST" class="flex items-center space-x-4">
                    <input type="text" name="category_name" class="p-2 rounded border" placeholder="Add New Category" required>
                    <button type="submit" name="add_category" class="bg-[#F7941D] px-4 py-2 rounded text-white">Add Category</button>
                </form>
            </div>

            <!-- Categories List -->
            <table class="w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-3 text-left text-white">Category ID</th>
                        <th class="p-3 text-left text-white">Category Name</th>
                        <th class="p-3 text-left text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $categories->fetch_assoc()): ?>
                    <tr class="border-b">
                        <td class="p-3 text-white"><?php echo $row['id']; ?></td>
                        <td class="p-3 text-white"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="p-3 text-white">
                            <a href="admin_categories.php?delete=<?php echo $row['id']; ?>" class="text-red-600">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </main>
    </div>

</body>
</html>
