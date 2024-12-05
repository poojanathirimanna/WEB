<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sign In</title>
   <link rel="stylesheet" href="Signin_register_style.css">
</head>
<body>

<!-- PHP Authentication Logic -->
<?php
// Start the session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'pstech');

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query to fetch the user based on the email
    $stmt = $conn->prepare("SELECT id, name, email, password, role FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // If a user is found with the given email
    if ($stmt->num_rows == 1) {
        // Bind the result to variables
        $stmt->bind_result($id, $name, $email, $hashed_password, $role);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $id;      // Store user ID in session
            $_SESSION['name'] = $name;       // Store the user's name in session
            $_SESSION['email'] = $email;     // Store email in session
            $_SESSION['role'] = $role;       // Store role in session

            // Redirect based on role
            if ($role == 'admin') {
                header("Location: ../dashboard.php");  // Admin dashboard
            } else {
                header("Location: ../index2.php");  // Regular user homepage
            }
            exit();
        } else {
            echo "<p style='color:red;'>Invalid password.</p>";
        }
    } else {
        echo "<p style='color:red;'>No user found with that email.</p>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!-- HTML Form for Sign In -->
<div class="container">
   <!-- Sign In Form -->
   <div class="form-container sign-in-container">
      <form action="login.php" method="POST">
         <h1>SIGN IN</h1>
         <div class="social-container">
            <!-- Social buttons if needed -->
         </div>
         <input type="email" placeholder="Email" name="email" required/>
         <input type="password" placeholder="Password" name="password" required/>
         <a href="#">Forgot your password?</a>
         <button type="submit">Sign In</button>
      </form>
   </div>

   <!-- Overlay Panel -->
   <div class="overlay-container">
      <div class="overlay">
         <div class="overlay-panel overlay-right">
            <h1>Welcome to PSTECH</h1>
            <p>Enter your personal details and start your journey with us</p>
            <button class="ghost" id="signUp" onclick="window.location.href='register.php'">Sign Up</button>
         </div>
      </div>
   </div>
</div>

<script src="Signin_register_style.js"></script>

</body>
</html>
