<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PST TECH</title>
    <!-- Tailwind CSS -->
    <link href="../public/src/output.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <!-- Header -->
    <header class="bg-gray-800 text-white p-4 flex items-center justify-between shadow-md">
        <!-- Logo -->
        <div class="text-2xl font-bold"> <a href="../index.php">PST TECH</a></div>

        <!-- Navigation Links -->
        <nav class="space-x-6 flex-1 text-center">
            <a href="./services.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Services</a>
            <a href="./contact.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Contact</a>
        </nav>

        <div class="flex space-x-4 items-center">
            <input type="text" placeholder="Search for products" class="p-2 rounded-md focus:outline-none">
            <a href="../signin/login.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Login</a>
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
                    PROCESSORS <span class="text-2xl"></span>
                    </h2>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 justify-center px-4">
                    <!-- Product 1 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/ASUS ProArt B760-CREATOR D4.png" alt="Lenovo Legion" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">ASUS ProArt B760-CREATOR D4</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">109,000</p>
                        <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded">In Stock</span>

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/ASUS ROG STRIX B760-F GAMING WIFI DDR5.png" alt="MSI Raider" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">ASUS ROG STRIX B760-F GAMING WIFI DDR5</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">119,500 LKR</p>
                        <!-- <p class="text-gray-400 line-through">(1,660,000 LKR)</p> -->
                        <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded">In Stock</span>

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/ASUS TUF B550M-PLUS WIFI II.png" alt="ASUS Vivobook" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">ASUS TUF B550M-PLUS WIFI II</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">74,500 LKR</p>
                        
                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>
                    <!-- Product 4 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/ASUS ROG STRIX Z790-A GAMING WIFI DDR5.png" alt="Lenovo Legion" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">ASUS ROG STRIX Z790-A GAMING WIFI DDR5</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">135,000 LKR</p>
                        <!-- <p class="text-gray-400 line-through">(1,499,000 LKR)</p> -->
                        <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded">In Stock</span>

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>
                    <!-- Product 5 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/MSI PRO B650M-P.png" alt="Lenovo Legion" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">MSI PRO B650M-P</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">150,000 LKR</p>
                        <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded">In Stock</span>

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>
                    <!-- Product 6 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:bg-[#F7941D] hover:scale-105">
                        <img src="../IMAGES/ASUS PRIME A520M-A II.png" alt="Lenovo Legion" class="w-full h-48 object-contain rounded-md mb-4">
                        <h3 class="text-xl font-bold">ASUS PRIME A520M-A II</h3>
                        <p class="text-[#F7941D]">MOTHERBOARDS</p>
                        <p class="text-yellow-400 text-2xl font-bold mt-2">36,000 LKR</p>
                        <span class="inline-block bg-green-600 text-white text-xs font-bold mt-2 px-2 py-1 rounded">In Stock</span>

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-4">
                            <button class="bg-[#F7941D] text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">Add to Cart</button>
                            <button class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300">View Details</button>
                        </div>
                    </div>

                    <!-- Add more products as needed -->
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
                        <!-- <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-facebook text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-twitter text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-whatsapp text-2xl"></i></a> -->
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
