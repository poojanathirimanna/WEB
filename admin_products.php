<?php
session_start();

// Check if the admin is logged in and authorized
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Include database connection
require 'connect.php';

// Handle product deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id") or die($conn->error);
}

// Handle product creation
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    // Handle image upload
    if (isset($_FILES['product_image'])) {
        $target_dir = "IMAGES/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]); //$_files = super global array
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is valid
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $image_path = "IMAGES/" . basename($_FILES["product_image"]["name"]);

            // Insert product into the database
            $conn->query("INSERT INTO products (name, description, price, stock, category_id, image) 
                         VALUES ('$name', '$description', '$price', '$stock', '$category_id', '$image_path')")
                         or die($conn->error);
            echo "Product added successfully!";
        } else {
            echo "Sorry, there was an error uploading your image.";
        }
    }
}

// Fetch products from the database
$result = $conn->query("SELECT * FROM products") or die($conn->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <!-- Tailwind CSS -->
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="text-2xl font-bold ">Admin Dashboard</div>
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
            <h1 class="text-3xl font-bold mb-6 text-white">Manage Products</h1>

            <!-- Product Form (Add Product) -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4 text-white">Add New Product</h2>
                <form action="admin_products.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="name" class="text-lg font-semibold text-white">Product Name :</label>
                        <input type="text" name="name" id="name" placeholder="Product Name" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col">
                        <label for="description" class="text-lg font-semibold text-white">Description :</label>
                        <textarea name="description" id="description" placeholder="Product Description" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]"></textarea>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex flex-col flex-1"> 
                            <label for="price" class="text-lg font-semibold text-white">Price : </label>
                            <input type="number" name="price" id="price" placeholder="Price" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="stock" class="text-lg font-semibold text-white">Stock : </label>
                            <input type="number" name="stock" id="stock" placeholder="Stock" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="category_id" class="text-lg font-semibold text-white">Category : </label>
                        <select name="category_id" id="category_id" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                            <option value="1">Laptops</option>
                            <option value="2">RAM</option>
                            <option value="3">Processors</option>
                            <option value="4">Graphic Cards</option>
                            <option value="5">Motherboards</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="product_image" class="text-lg font-semibold text-white">Product Image</label>
                        <input type="file" name="product_image" id="product_image" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <button type="submit" name="add_product" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add Product</button>
                </form>
            </div>

            <!-- Product Table -->
            <h2 class="text-2xl font-bold mb-4 text-white">Product List</h2>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Price</th>
                            <th class="py-3 px-6 text-left">Stock</th>
                            <th class="py-3 px-6 text-left">Image</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-6 text-white"><?php echo $row['id']; ?></td>
                                <td class="py-3 px-6 text-white"><?php echo $row['name']; ?></td>
                                <td class="py-3 px-6 text-white"><?php echo $row['price']; ?></td>
                                <td class="py-3 px-6 text-white"><?php echo $row['stock']; ?></td>
                                <td class="py-3 px-6 text-white"><img src="<?php echo $row['image']; ?>" width="100" alt="Product Image"></td>
                                <td class="py-3 px-6 flex space-x-2">
                                    <a href="admin_edit_product.php?id=<?php echo $row['id']; ?>" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit</a>
                                    <a href="admin_products.php?delete=<?php echo $row['id']; ?>" class="bg-red-500 text-black px-4 py-2 rounded-md hover:bg-red-600 transition duration-300" onclick="return confirm('Are you sure?')">Delete</a>
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
