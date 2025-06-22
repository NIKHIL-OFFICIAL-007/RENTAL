<?php
include "db.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $role = "user"; // default role

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($check->num_rows > 0) {
        $error = "Email already registered!";
    } else {
        $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
        if ($conn->query($sql)) {
            $success = "Registration successful! <a href='login.php'>Click here to login</a>.";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register - Vehicle Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Montserrat', sans-serif;
            background: url('login-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            height: 100vh;
            overflow: hidden;
            padding-top: 80px;
        }

        .overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        .navbar {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            padding: 20px 50px;
            background: linear-gradient(to right, #ff512f, #f09819);
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .logo {
            font-size: 28px;
            font-weight: 900;
            color: white;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            position: relative;
            z-index: 1;
        }

        .container {
            width: 400px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: none;
            border-radius: 6px;
            background: #2c2c2c;
            color: #fff;
        }

        input::placeholder {
            color: #aaa;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background: linear-gradient(to right, #ff512f, #f09819);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #f46a0a;
        }

        .error { color: #ff5f5f; margin-top: 10px; }
        .success { color: #8bc34a; margin-top: 10px; }

        a { color: #f09819; text-decoration: none; }
        a:hover { text-decoration: underline; }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #aaa;
            transition: transform 0.2s ease;
        }

        .toggle-password:hover { color: #f09819; }
        .pulse { animation: pulseIcon 0.3s ease; }

        @keyframes pulseIcon {
            0% { transform: scale(1); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="overlay"></div>

    <header>
        
    </header>

    <div class="wrapper">
        <div class="container">
            <h2>Create Account</h2>
            <form method="post" action="">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword(this)"></i>
                </div>
                <input type="submit" value="Register">
            </form>
            <p class="error"><?php echo $error; ?></p>
            <p class="success"><?php echo $success; ?></p>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </div>
    </div>

    <script>
    function togglePassword(icon) {
        const passwordInput = document.getElementById("password");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }

        icon.classList.add("pulse");
        setTimeout(() => icon.classList.remove("pulse"), 300);
    }
    </script>
</body>
</html>