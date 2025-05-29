<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    // User is already logged in, redirect to welcome page  
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "usm" && $password == "123") {
        // Set session variable
        $_SESSION['username'] = $username;
        header("Location: dashboardprak.php");
    }
}


?>

<html>
    <head>
        <title>login page</title>
        <style type="text/css">
            body{
                font-family: Arial, sans-serif;
                background: linear-gradient(to right, rgb(87, 118, 243), rgb(31, 72, 238), rgb(87, 118, 243), rgb(31, 72, 238), rgb(87, 118, 243), rgb(31, 72, 238) );
                background-size: cover ;
                background-position: center;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            table{
                background-color: (to bottom rgb(87, 118, 243), rgb(31, 72, 238), rgb(87, 118, 243), rgb(31, 72, 238));
                border: 3px solid white;
                padding: 20px;
                border-radius: 10px;
                font-family: Arial, Helvetica, sans-serif;
                color: white;
            }
            td{
                padding: 5px;
            }
            button{
                background-color: rgb(65, 93, 206);
                padding: 10px;
                border-radius: 5px;
                color: white; 
            }
        </style>
    </head>
    <body>
        <form action="loginprak.php" method="post">
         <table>
            <tr>
                <td colspan="2" style="text-align: center;" >LOGIN</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" /> Ingatkan saya</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit" >SUBMIT</button></td>
            </tr>
        </table>
        </form>
    </body>
</html>