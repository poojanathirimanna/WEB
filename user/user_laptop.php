<?php
require '../connect.php';

// Define the category ID for laptops
$category_id = 1;  // Replace with the actual category ID for laptops

// Fetch products from the database that belong to the 'Laptops' category
$stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
$stmt->bind_param("i", $category_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops</title>
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

    <!-- Sidebar and Main Content -->
    <div class="flex flex-grow">
        <!-- Sidebar -->
        <aside class="w-40 bg-gray-900 text-white p-4 space-y-6">
            <a href="user_laptop.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">LAPTOPS</a>
            <a href="user_graphiccard.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">GRAPHIC CARDS</a>
            <a href="user_ram.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">RAM</a>
            <a href="user_processor.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">PROCESSORS</a>
            <a href="user_motherboards.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">MOTHERBOARDS</a>
        </aside>

        <!-- Main Content -->
        <main class="ml-4 flex-grow">
            <section class="bg-black py-4">
                <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
                    <h2 class="inline-block border-b-4 border-[#F7941D]">
                        LAPTOPS
                    </h2>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center px-4">
                    <!-- Fetch products dynamically from the database -->
                    <?php while ($product = $result->fetch_assoc()): ?>
                        <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-full h-48 object-contain rounded-md mb-4">
                            <h3 class="text-xl font-bold"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="text-[#F7941D]">Laptops</p>
                            <p class="text-yellow-400 text-2xl font-bold mt-2"><?php echo number_format($product['price'], 2); ?> LKR</p>
                            <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded"><?php echo $product['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></span>

                            <!-- Buttons -->
                            <form action="user_cart.php" method="POST">
                             <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="add_to_cart" class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                             </form>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <footer class="w-full bg-[#F7941D] text-white py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <!-- Column 1 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">PST TECH</h5>
                    <p class="text-gray-200">We at PST TECH are committed to providing high-quality products to enhance your computing experience.</p>
                </div>

                <!-- Column 2 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">Contact</h5>
                    <p class="text-gray-200 mb-2">8B/12L, N,H,S, Raddolugama, Sri Lanka</p>
                    <p class="text-gray-200 mb-2">info@psttech.com</p>
                    <p class="text-gray-200">+94 112 289 373</p>
                </div>

                <!-- Column 3 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">Follow Us</h5>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <!-- Social Links -->
                    </div>
                </div>
            </div>
            <div class="border-t border-white mt-8 pt-6 text-center">
                <p class="text-gray-200">&copy; 2024 PST TECH. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
