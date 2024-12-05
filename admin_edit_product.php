<?php
session_start();

// Check if the admin is logged in and authorized
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../signin/login.php");
    exit();
}

// Include database connection
require 'connect.php';

// Get product ID from the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the product details
    $result = $conn->query("SELECT * FROM products WHERE id=$id") or die($conn->error);
    
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
}

// Handle product update
if (isset($_POST['update_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    // Handle image upload (optional)
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "../IMAGES/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Move the uploaded file
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $image_path = "../IMAGES/" . basename($_FILES["product_image"]["name"]);
            // Update with new image
            $conn->query("UPDATE products SET name='$name', description='$description', price='$price', stock='$stock', category_id='$category_id', image='$image_path' WHERE id=$id")
                or die($conn->error);
        } else {
            echo "Error uploading image.";
        }
    } else {
        // Update without changing the image
        $conn->query("UPDATE products SET name='$name', description='$description', price='$price', stock='$stock', category_id='$category_id' WHERE id=$id")
            or die($conn->error);
    }

    header("Location: admin_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Tailwind CSS -->
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Top Navbar -->
    <header class="bg-gray-800 text-white p-4 flex justify-between items-center">
        <div class="text-2xl font-bold">Admin Dashboard</div>
        <a href="../signin/logout.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Logout</a>
    </header>

    <!-- Edit Product Section -->
    <main class="p-6">
        <h1 class="text-3xl font-bold mb-6">Edit Product</h1>

        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <form action="admin_edit_product.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                        <input type="number" name="price" id="price" value="<?php echo htmlspecialchars($product['price']); ?>" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                    <div class="flex flex-col flex-1">
                        <label for="stock" class="text-lg font-semibold">Stock</label>
                        <input type="number" name="stock" id="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="category_id" class="text-lg font-semibold">Category</label>
                    <select name="category_id" id="category_id" required class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                        <option value="1" <?php echo ($product['category_id'] == 1) ? 'selected' : ''; ?>>Laptops</option>
                        <option value="2" <?php echo ($product['category_id'] == 2) ? 'selected' : ''; ?>>Graphic Cards</option>
                        <option value="3" <?php echo ($product['category_id'] == 3) ? 'selected' : ''; ?>>RAM</option>
                        <option value="4" <?php echo ($product['category_id'] == 4) ? 'selected' : ''; ?>>Processors</option>
                        <option value="5" <?php echo ($product['category_id'] == 5) ? 'selected' : ''; ?>>Motherboards</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="product_image" class="text-lg font-semibold">Product Image (optional)</label>
                    <input type="file" name="product_image" id="product_image" class="border p-3 rounded-md focus:outline-none focus:ring-2 focus:ring-[#F7941D]">
                </div>
                <button type="submit" name="update_product" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Update Product</button>
            </form>
        </div>
    </main>
</body>
</html>
