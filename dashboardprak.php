<?php
session_start();
if (!isset($_SESSION['username'])) {
    // User is already logged in, redirect to welcome page  
    header("Location: loginprak.php");
    exit();
}

$username = $_SESSION['username'];

// Buat nama file untuk menyimpan jumlah login per user
$file = "login_count_{$username}.txt";

// Cek apakah file sudah ada, jika ya ambil isinya, kalau belum mulai dari 0
if (file_exists($file)) {
    $count = (int)file_get_contents($file);
} else {
    $count = 0;
}

// Tambah 1 setiap kali halaman dibuka
$count++;

// Simpan kembali ke file
file_put_contents($file, $count);

if(!isset($_SESSION["daftar"])){
    $_SESSION["daftar"] = [];
}

if(isset($_POST["nama"]) && isset($_POST["umur"])){
    $daftar = [
        "nama" => $_POST["nama"],
        "umur" => $_POST["umur"]
    ];
    $_SESSION["daftar"][] = $daftar;
}

?>
<html>
    <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
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
                cursor: pointer;
            }
             #logout{
                cursor: pointer;

            }
        </style>
    </head>
    <body>
        <h1>
            
        <form action="dashboardprak.php" method="post">
         <table>
            <tr>
                <td colspan="2" style="text-align: center;" >DAFTAR</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" /></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur" /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit" >SUBMIT</button>
                    <a href="logoutprak.php">
                        <button id="logout" type="button" >LOGOUT</button>
                    </a>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Nama</td>
                <td>Umur</td>
            </tr>
                <?php foreach($_SESSION["daftar"] as $daftar): ?>
                 <tr>
                    <td><?php echo $daftar["nama"] ?></td>
                    <td><?php echo $daftar["umur"] ?></td>
                 </tr>
                 <?php endforeach; ?>
        </table>
        </form>

        <?php echo "Selamat datang " . $username . " ke-" . $count  ; ?></h1>
        
    </body>
</html>