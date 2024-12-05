<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - PSTech</title>
    <style>
        /* Apply styles for the body */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0d1b2a; /* Dark background color */
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #0d1b2a;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logo a {
            text-decoration: none;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar .nav-links {
            list-style: none;
            display: flex;
        }
        .navbar .nav-links li {
            margin-left: 20px;
        }
        .navbar .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .navbar .search-login {
            display: flex;
            align-items: center;
        }
        .navbar .search-login input {
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .navbar .search-login a {
            background-color: #F7941D;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        /* Contact Section */
        .container {
            padding: 20px;
            margin-left: 220px;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }
        .contact-info {
            margin-bottom: 30px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Dark transparent background */
            border-radius: 10px;
        }
        .contact-info h2 {
            font-size: 24px;
            background-color: #F7941D; /* Orange background for headers */
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .contact-info p {
            font-size: 16px;
            margin-top: 10px;
        }

        /* Google Map */
        .map {
            margin-bottom: 40px;
            padding: 20px;
            border-radius: 10px;
        }

        /* Footer */
        footer {
            background-color: #0d1b2a;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo">
            <a href="../index.php">PST Tech</a>
        </div>
        <ul class="nav-links">
            <!-- <li><a href="home.php">Home</a></li> -->
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="search-login">
            <input type="text" placeholder="Search for products">
            <a href="login.php">Login</a>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container">
        <h1>Contact Us</h1>

        <div class="contact-info">
            <h2>📍 Our Location</h2>
            <p><strong>Address:</strong> 213,Stanly Thilakarathne mawatha , Nugegoda  Sri Lanka</p>
            <p><strong>Phone:</strong> +94 77 233 3473</p>
            <p><strong>Email:</strong> contact@pstech.com</p>
        </div>

        <!-- Google Map -->
        <div class="map">
            <h2>🌍 Find Us Here</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.121734327094!2d79.8903286758811!3d6.8760152931227925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a40e884158f%3A0xea37ec80a006392b!2s213%20Stanley%20Tilakaratne%20Mawatha%2C%20Nugegoda!5e0!3m2!1sen!2slk!4v1726527036779!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PST Tech. All Rights Reserved.</p>
    </footer>

</body>
</html>
