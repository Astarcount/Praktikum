<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "usm" && $password == "123") {
        $_SESSION['username'] = $username;
        header("Location: dashboardprak.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to right, rgb(87, 118, 243), rgb(31, 72, 238));
            font-family: Arial, sans-serif;
        }

        .login-container {
            width: 380px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: white;
            text-align: center;
            position: relative;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            margin: 0 auto 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            text-align: left;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .login-container input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-container {
            margin-bottom: 20px;
            font-size: 14px;
            text-align: left;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: rgba(65, 93, 206, 0.9);
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: rgba(65, 93, 206, 1);
        }
    </style>
</head>
<body>
    <form action="loginprak.php" method="post" class="login-container">
        <div class="avatar">
            👤
            <!-- Bisa juga diganti dengan gambar <img src="avatar.png" width="80" height="80"> -->
        </div>
        <h2>SIGN UP</h2>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <div class="checkbox-container">
            <input type="checkbox" id="remember">
            <label for="remember" style="display: inline;">Ingatkan saya</label>
        </div>

        <button type="submit">LOGIN</button>
    </form>
</body>
</html>
