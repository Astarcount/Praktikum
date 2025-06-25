
<?php
session_start();
$index = $_GET["index"];
unset($_SESSION["daftar"][$index]);
header("Location: dashboardprak.php")
?>
