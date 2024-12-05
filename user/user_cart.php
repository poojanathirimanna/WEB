<?php
session_start();
require '../connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../signin/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle Add to Cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1; // Default quantity is 1

    // Check if the product is already in the cart
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the product is already in the cart, update the quantity
        $stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("ii", $user_id, $product_id);
        $stmt->execute();
    } else {
        // Otherwise, insert a new row into the cart
        $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $user_id, $product_id, $quantity);
        $stmt->execute();
    }
}

// Handle Remove from Cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    $cart_id = $_POST['cart_id'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    header("Location: user_cart.php"); // Refresh cart page after removing item
    exit();
}

// Fetch cart items for the current user
$stmt = $conn->prepare("SELECT products.name, products.price, cart.quantity, cart.id AS cart_id
                        FROM cart
                        JOIN products ON cart.product_id = products.id
                        WHERE cart.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
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

    <!-- Add Products to Cart -->
    <section class="bg-black py-4">
        <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
            <h2 class="inline-block border-b-4 border-[#F7941D]">Add Products to Cart</h2>
        </div>
        
        <!-- Example of Products to Add to Cart -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center px-4">
            <?php
            // Fetch all products (for demonstration, you can adjust based on the category page)
            $product_result = $conn->query("SELECT * FROM products");
            while ($product = $product_result->fetch_assoc()): 
            ?>
            <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-48 object-contain rounded-md mb-4">
                <h3 class="text-xl font-bold"><?php echo htmlspecialchars($product['name']); ?></h3>
                <p class="text-[#F7941D]">Price: <?php echo number_format($product['price'], decimals: 2); ?> LKR</p>
                <form action="user_cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="add_to_cart" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                </form>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Display Cart -->
    <section class="bg-black py-4">
        <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
            <h2 class="inline-block border-b-4 border-[#F7941D]">Your Cart</h2>
        </div>

        <table class="min-w-full bg-gray-800 text-white rounded-lg shadow-lg p-6">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-6 text-left">Product Name</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Quantity</th>
                    <th class="py-3 px-6 text-left">Total</th>
                    <th class="py-3 px-6 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $cart_items->fetch_assoc()): ?>
                <tr class="border-b hover:bg-gray-700">
                    <td class="py-3 px-6"><?php echo htmlspecialchars($item['name']); ?></td>
                    <td class="py-3 px-6"><?php echo number_format($item['price'], 2); ?> LKR</td>
                    <td class="py-3 px-6"><?php echo $item['quantity']; ?></td>
                    <td class="py-3 px-6"><?php echo number_format($item['price'] * $item['quantity'], 2); ?> LKR</td>
                    <td class="py-3 px-6">
                        <form action="user_cart.php" method="POST">
                            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                            <button type="submit" name="remove_from_cart" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Checkout Button -->
        <div class="flex justify-end mt-4">
            <form action="check_out.php" method="POST">
                <button type="submit" class="bg-[#F7941D] text-black px-6 py-3 rounded-md hover:bg-orange-600 transition duration-300">Proceed to Checkout</button>
            </form>
        </div>

    </section>
</body>
</html>
