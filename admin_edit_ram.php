<?php
session_start();

// Check if the admin is logged in and authorized
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Include database connection
require '../connect.php';

// Get the product ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the product from the database
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ? AND category_id = 2");  // Ensure we're fetching a RAM product
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    // Check if product exists
    if (!$product) {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid product ID!";
    exit();
}

// Handle product update
if (isset($_POST['update_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = 2; // RAM category ID

    // Handle image upload (optional)
    if (!empty($_FILES['product_image']['name'])) {
        $target_dir = "../IMAGES/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is valid
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $image_path = "../IMAGES/" . basename($_FILES["product_image"]["name"]);

            // Update product with image
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, image = ? WHERE id = ? AND category_id = ?");
            $stmt->bind_param("ssdisii", $name, $description, $price, $stock, $image_path, $id, $category_id);
        } else {
            echo "Sorry, there was an error uploading your image.";
        }
    } else {
        // Update product without changing the image
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ? AND category_id = ?");
        $stmt->bind_param("ssdisi", $name, $description, $price, $stock, $id, $category_id);
    }

    if ($stmt->execute()) {
        echo "Product updated successfully!";
        header("Location: admin_ram.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit RAM Product</title>
    <!-- Tailwind CSS -->
    <link href="../public/src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">Admin Dashboard</div>
        <a href="../signin/logout.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
    </header>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-1/5 bg-gray-900 text-white p-4 space-y-6">
            <a href="admin_orders.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Orders</a>
            <a href="admin_products.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Products</a>
            <a href="admin_customers.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Customers</a>
            <a href="admin_categories.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">Categories</a>
        </aside>

        <!-- Main Content -->
        <main class="w-4/5 p-6">
            <!-- Page Title -->
            <h1 class="text-3xl font-bold mb-6">Edit RAM Product</h1>

            <!-- Product Form (Edit Product) -->
            <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <form action="admin_edit_ram.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex flex-col">
                        <label for="name" class="text-lg font-semibold">Product Name</label>
                        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($product['name']); ?>" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col">
                        <label for="description" class="text-lg font-semibold">Description</label>
                        <textarea name="description" id="description" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex flex-col flex-1">
                            <label for="price" class="text-lg font-semibold">Price</label>
                            <input type="number" name="price" id="price" value="<?php echo $product['price']; ?>" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                        </div>
                        <div class="flex flex-col flex-1">
                            <label for="stock" class="text-lg font-semibold">Stock</label>
                            <input type="number" name="stock" id="stock" value="<?php echo $product['stock']; ?>" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <label for="product_image" class="text-lg font-semibold">Product Image (optional)</label>
                        <input type="file" name="product_image" id="product_image" class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <button type="submit" name="update_product" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Update Product</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
