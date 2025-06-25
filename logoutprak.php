
<?php
session_start();

// Hapus file counter login jika ada
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $file = "login_count_{$username}.txt";
    if (file_exists($file)) {
        unlink($file); // Menghapus file login counter
    }
}

// Hapus seluruh session
session_destroy();

// Redirect ke halaman login
header("Location: loginprak.php");
exit();
?>
