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

?>
<html>
    <head>
        <title>::Login Page::</title>
        <style type="text/css">
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <h1><?php echo "Selamat datang " . $username . " ke-" . $count  ; ?></h1>
        
    </body>
</html>