<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sign Up</title>
   <link rel="stylesheet" href="Signin_register_style.css">
</head>
<body>

<!-- PHP Registration Logic -->
<?php
// Start the session
session_start();

// Database connection (defined directly in register.php)
$conn = new mysqli('localhost', 'root', '', 'pstech');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin_code = $_POST['admin_code'];  // Admin code input from the form

    // Hardcoded admin code
    $correct_admin_code = "Admin123";  // Replace this with your actual admin code

    // Check if the email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<p style='color:red;'>Email already exists!</p>";
    } else {
        // Hash the password before saving it
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Check if the admin code is correct
        if ($admin_code === $correct_admin_code) {
            $role = 'admin';  // Assign admin role
        } else {
            $role = 'user';  // Assign regular user role
        }

        // Insert the new user with the role based on the admin code
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("SQL error: " . $conn->error);
        }
        $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Registration successful. You can now <a href='login.php'>log in</a>.</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<div class="container">
   <!-- Sign Up Form -->
   <div class="form-container sign-up-container">
      <form action="register.php" method="POST">
         <h1>Create Account</h1>
         <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
         </div>
         <span>or use your email for registration</span>
         <input type="text" placeholder="Name" name="name" required/>
         <input type="email" placeholder="Email" name="email" required/>
         <input type="password" placeholder="Password" name="password" required/>
         <input type="text" placeholder="Admin Code (optional)" name="admin_code"/> <!-- Admin code field -->
         <button type="submit">Register</button>
         <p>Already have an account? 
            <a href="login.php">Sign in here</a>
         </p>
      </form>
   </div>

   <!-- Overlay Panel -->
   <div class="overlay-container">
      <div class="overlay">
         <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn" onclick="window.location.href='login.php'">Sign In</button>
         </div>
      </div>
   </div>
</div>

<script src="Signin_register_style.js"></script>

</body>
</html>
