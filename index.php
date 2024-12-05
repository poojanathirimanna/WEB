<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PST TECH</title>
    <!-- Tailwind CSS -->
    <link href="../WEB/public/src/output.css" rel="stylesheet">
</head>

<!-- Header -->
<header class="bg-gray-800 text-white p-4 flex items-center justify-between shadow-md">
    <!-- Left side (Logo) -->
    <div class="text-2xl font-bold">PST TECH</div>

    <!-- Center (Navigation Links) -->
    <nav class="space-x-6 flex-1 text-center">
        <a href="./user/services.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Services</a>
        <a href="./user/contact.php" class="hover:text-[#F7941D] transition duration-300 mx-4">Contact</a>
    </nav>

    <!-- Update the href to point to src/login.php -->
    <a href="../WEB/signin/login.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300 text-center">Login</a>
    <!-- If needed, you can uncomment the register button in the future -->
    <!-- <a href="src/register.php" class="bg-[#F7941D] px-4 py-2 rounded-md hover:bg-orange-600 transition duration-300 text-center">Register</a> -->
</div>

</header>


    <!-- Sidebar and Main Content -->
    <div class="flex flex-grow">
        <!-- Sidebar -->
        <aside class="w-40 bg-gray-900 text-white p-4 space-y-6">
            <a href="../WEB/user/user_laptop.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">LAPTOPS</a>
            <a href="../WEB/user/user_graphiccard.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">GRAPHIC CARDS</a>
            <a href="../WEB/user/user_ram.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">RAM</a>
            <!-- <a href="" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">POWER SUPPLIES</a> -->
            <a href="../WEB/user/user_processor.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">PROCESSORS</a>
            <a href="../WEB/user/user_motherboards.php" class="block p-2 rounded-md hover:bg-[#F7941D] transition-colors duration-300">MOTHERBOARDS</a>
        </aside>
        <body class="bg-gray-900">
    <!-- Your page content goes here -->
<

     <!-- Main Content -->
        <main class="ml-4 flex-grow">
            <!-- Slideshow Banner -->
            <section class="relative max-w-full mx-auto overflow-hidden h-[750px]">
                <div class="banner-slide w-full h-full">
                    <img src="../WEB/IMAGES/GAMING.jpg" class="object-cover w-full h-full" alt="Gaming Setup">
                    <div class="absolute bottom-8 w-full flex justify-center items-center text-white">
                        <h1 class="text-5xl font-bold marquee">
                        <span class="marquee-text">The Best PC Parts and Gaming Accessories in Town</span>
    </h1>
</div>

                </div>
                <div class="banner-slide hidden w-full h-full">
                    <img src="../WEB/IMAGES/gaming-computer-6903836_1280.jpg" class="object-cover w-full h-full" alt="PC Setup">
                    <div class="absolute bottom-8 w-full flex justify-center items-center text-white">
                        <h1 class="text-5xl font-bold marquee">
                        <span class="marquee-text">UNLEASH THE POWER OF YOUR RIG</span>
                    </div>
                </div>
                <div class="banner-slide hidden w-full h-full">
                    <img src="../WEB/IMAGES/pexels-nanadua11-4581903.jpg" class="object-cover w-full h-full" alt="Custom Setup">
                    <div class="absolute bottom-8 w-full flex justify-center items-center text-white">
                        <h1 class="text-5xl font-bold marquee">
                        <span class="marquee-text">CUSTOMIZE YOUR DREAM</span>
                    </div>
                </div>

                <!-- Next and Previous Buttons -->
                <a id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-4 py-2 text-2xl cursor-pointer">&#10094;</a>
                <a id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-4 py-2 text-2xl cursor-pointer">&#10095;</a>
            </section>
            

            <section class="bg-black py-4">
                <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
                    <h2 class="inline-block border-b-4 border-[#F7941D]">
                        SPECIAL OFFERS <span class="text-2xl">%</span>
                    </h2>
                </div>

                <!-- Special Offers Grid -->
                <div class="w-60 h-60 grid grid-cols-1 md:grid-cols-3 gap-4 justify-center px-4">
                    <!-- Offer 1 -->
                    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="../WEB/IMAGES/MSIMONITOR.png" alt="MSI G27C4X" class="w-full h-auto">
                        </div>
                        <h3 class="text-lg font-bold mt-2">MSI G27C4X 27" 1080P 250HZ Curved Gaming</h3>
                        <p class="text-[#F7941D] mt-1">- Monitors & Accessories -</p>
                        <p class="text-yellow-400 text-xl font-bold mt-1">77,000 LKR</p>
                        <p class="text-gray-400 line-through">(90,000 LKR)</p>
                    </div>

                    <!-- Offer 2 -->
                    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="../WEB/IMAGES/ASUSVIVOBOOK2.png" alt="Asus Vivobook" class="w-full h-auto">
                        </div>
                        <h3 class="text-lg font-bold mt-2">Asus Vivobook 15 X1504VA i3 13th Gen</h3>
                        <p class="text-[#F7941D] mt-1">- Laptops -</p>
                        <p class="text-yellow-400 text-xl font-bold mt-1">164,000 LKR</p>
                        <p class="text-gray-400 line-through">(180,000 LKR)</p>
                    </div>

                    <!-- Offer 3 -->
                    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
                        <div class="relative">
                            <img src="../WEB/IMAGES/creator.png" alt="ASUS Creator" class="w-full h-auto">
                        </div>
                        <h3 class="text-lg font-bold mt-2">ASUS Creator Q540V OLED i9 13th RTX 3050 6GB</h3>
                        <p class="text-[#F7941D] mt-1">- Laptops -</p>
                        <p class="text-yellow-400 text-xl font-bold mt-1">399,000 LKR</p>
                        <p class="text-gray-400 line-through">(409,000 LKR)</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!-- Special Offers Title -->
    <div class="text-center text-[#F7941D] text-4xl font-bold mb-6">
        <h2 class="inline-block border-b-4 border-[#F7941D]">
           * NEW ARRIVALS *<span class="text-2xl"></span>
        </h2>
    </div>
    

    <!-- Special Offers Grid -->
    <div class="w-58 h-58 grid grid-cols-1 md:grid-cols-3 gap-4 justify-center px-4">
    <!-- Offer 1 -->
    <div class="bg-gray-800 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
        <div class="relative">
            <img src="../web/images/rtx4080.png" alt="MSI G27C4X" class="w-full h-auto">
        </div>
        <h3 class="text-lg font-bold mt-2">MSI RTX 4080 SUPER GAMING SLIM 16GB</h3>
        <!-- <p class="text-[#F7941D] mt-1">- Monitors & Accessories -</p> -->
        <p class="text-yellow-400 text-xl font-bold mt-1">529,000 LKR</p>
        <!-- <p class="text-gray-400 line-through">(90,000 LKR)</p> -->
    </div>

    <!-- Offer 2 -->
    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
        <div class="relative">
            <img src="../WEB/IMAGES/ASUS ROG STRIX Z790-A GAMING WIFI DDR5.png" alt="Asus Vivobook" class="w-full h-auto">
        </div>
        <h3 class="text-lg font-bold mt-2">ASUS ROG MAXIMUS Z790 DARK HERO</h3>
        <!-- <p class="text-[#F7941D] mt-1">ASUS ROG MAXIMUS Z790 DARK HERO</p> -->
        <p class="text-yellow-400 text-xl font-bold mt-1">300,000 LKR</p>
        <!-- <p class="text-gray-400 line-through">(180,000 LKR)</p> -->
    </div>

    <!-- Offer 3 -->
    <div class="bg-gray-900 text-white rounded-lg shadow-lg p-4 transition duration-300 hover:scale-105">
        <div class="relative">
            <img src="../WEB/IMAGES/i7.png" alt="ASUS Creator" class="w-full h-auto">
        </div>
        <h3 class="text-lg font-bold mt-2">Intel Core i7 14700 (33M Cache, up to 5.40 GHz)</h3>
        <!-- <p class="text-[#F7941D] mt-1">- Laptops -</p> -->
        <p class="text-yellow-400 text-xl font-bold mt-1">132,000 LKR</p>
        <!-- <p class="text-gray-400 line-through">(409,000 LKR)</p> -->
    </div>
</div>
</main>

    <!-- Footer -->
    <footer class="w-full bg-[#F7941D] text-white py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <!-- Column 1 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">cloud-X</h5>
                    <p class="text-gray-200">We at cloudxcomputersolutions.lk&trade; are here to support your needs by providing high-quality products for your aspirations.</p>
                </div>

                <!-- Column 2 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">Contact</h5>
                    <p class="text-gray-200 mb-2">8B/12L, N,H,S, Raddolugama, Sri Lanka</p>
                    <p class="text-gray-200 mb-2">cloudxcomputersolutions@gmail.com</p>
                    <p class="text-gray-200">+94 112 289 373</p>
                </div>

                <!-- Column 3 -->
                <div class="footer-col">
                    <h5 class="text-xl font-bold text-white mb-4">Follow Us</h5>
                    <div class="flex justify-center md:justify-start space-x-4">
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-facebook text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-twitter text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-whatsapp text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-linkedin text-2xl"></i></a>
                        <a href="#" class="text-white hover:text-gray-200"><i class="bi bi-youtube text-2xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-white mt-8 pt-6 text-center">
                <p class="text-gray-200">&copy; 2024 CODECEE. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

</body>
  <!-- JavaScript for Slider -->
  <script src="../WEB/public/src/home.js"></script>
</html>
