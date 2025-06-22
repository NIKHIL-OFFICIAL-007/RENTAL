<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        $_SESSION["role"] = $row["role"];
        $_SESSION["name"] = $row["name"];

        if ($row["role"] == "admin") {
            header("Location: admin_panel.php");
        } elseif ($row["role"] == "owner") {
            header("Location: owner_dashboard.php");
        } elseif ($row["role"] == "staff") {
            header("Location: staff_panel.php");
        } else {
            header("Location: dashboard.php");
        }
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Vehicle Rental System</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        h2 {
            margin-bottom: 30px;
            font-size: 28px;
        }

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

        input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 14px;
    margin: 10px 0;
    border: none;
    border-radius: 6px;
    background: #2c2c2c !important;
    color: #fff !important;
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
}

input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0 1000px #2c2c2c inset !important;
    -webkit-text-fill-color: #fff !important;
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

        .error {
            color: #ff5f5f;
            margin-top: 10px;
        }

        a {
            color: #f09819;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

@media (max-width: 600px) {
.container {
              width: 90%;
             padding: 20px;
            }
        }

.password-wrapper {
    position: relative;
}

.password-wrapper input {
    width: 100%;
    padding-right: 40px;
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

.toggle-password:hover {
    color: #f09819;
}

/* Pulse animation on toggle */
.pulse {
    animation: pulseIcon 0.3s ease;
}

@keyframes pulseIcon {
    0% { transform: scale(1); }
    50% { transform: scale(1.3); }
    100% { transform: scale(1); }
}
    </style>
</head>
<body>
    <div class="overlay"></div>

    <div class="wrapper">
        <div class="container">
            <h2>User Login</h2>
            <form method="post" action="">
                <input type="email" name="email" placeholder="Email" required><br>
                <div class="password-wrapper">
    <input type="password" name="password" id="password" placeholder="Password" required>
    <i class="fas fa-eye toggle-password" onclick="togglePassword(this)"></i>
</div>
                <input type="submit" value="Login">
            </form>
            <p class="error"><?php echo $error; ?></p>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
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
</script>
</body>
</html>