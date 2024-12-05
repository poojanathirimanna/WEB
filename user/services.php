<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - PSTech</title>
    <style>
        /* Apply  styles for body */
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0d1b2a; /* The dark background color  */
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

        /* Services Section */
        .container {
            margin-left: 220px; /* Adjust to leave space for the side nav */
            padding: 20px;
        }
        h1 {
            font-size: 36px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }
        .service-section {
            margin-bottom: 40px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7); /* Dark transparent background */
            border-radius: 10px;
        }
        .service-header {
            font-size: 24px;
            background-color: #F7941D; /* Orange background for headers */
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .service-content {
            margin-top: 10px;
            font-size: 16px;
        }
        .conditions {
            font-weight: bold;
            margin-top: 10px;
            color: #F7941D; /* Orange text for conditions */
        }
        ul {
            margin-top: 10px;
            padding-left: 20px;
        }
        ul li {
            margin-bottom: 10px;
            line-height: 1.5;
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
            <!-- Wrap the logo in a link that points to home.php -->
            <a href="../index.php">PST Tech</a>
        </div>
        <ul class="nav-links">
            <!-- <li><a href="index.php">Home</a></li> -->
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="search-login">
            <input type="text" placeholder="Search for products">
            <a href="login.php">Login</a>
        </div>
    </div>

    <!-- Services Content -->
    <div class="container">
        <h1>Services</h1>

        <div class="service-section">
            <div class="service-header">🛡️ Warranty Assured</div>
            <div class="service-content">
                <p>In case of faulty products, we have an upstanding warranty and claim procedures to make sure that your requirements are met in minimum time loss as possible. Most of our suppliers are based locally, so we assure you that we can arrange the best possible warranty claim service, provided that the following conditions are met.</p>
                <div class="conditions">Conditions:</div>
                <ul>
                    <li>Warranty is only applicable to the extent of the supplier's warranty & terms and conditions.</li>
                    <li>Warranty is only applicable to the period mentioned in the invoice.</li>
                    <li>During claims, the packaging with serial numbers must be intact.</li>
                    <li>Warranty is only applicable to manufacturing defects.</li>
                    <li>Suppliers reserve the right to replace/refund/repair or replace with a different model.</li>
                </ul>
            </div>
        </div>

        <div class="service-section">
            <div class="service-header">🛠️ Custom Orders</div>
            <div class="service-content">
                <p>In case your requirements supersede what the local market has to offer, we will provide you with assistance to meet these requirements. We will step up across horizons to locate and satisfy these requirements, provided that the following conditions are met.</p>
                <div class="conditions">Conditions:</div>
                <ul>
                    <li>50% minimum down payment to proceed with Personalized Orders.</li>
                    <li>Any payment made to revoke Personalized Orders is non-refundable.</li>
                </ul>
            </div>
        </div>

        <div class="service-section">
            <div class="service-header">🚚 Home Delivery</div>
            <div class="service-content">
                <p>To further facilitate your access to your needs, we offer to deliver to most regions within Sri Lankan Borders. We have so far reached our valued customers in Jaffna. We assure you that we are willing to undertake delivery to any part of Sri Lanka provided that the following conditions are met.</p>
                <div class="conditions">Conditions:</div>
                <ul>
                    <li>10% full payment is required.</li>
                    <li>Payment must be made directly into our bank account for which details will be provided upon request.</li>
                    <li>Delivery is outsourced to a dedicated courier.</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 PST Tech. All Rights Reserved.</p>
    </footer>

</body>
</html>
