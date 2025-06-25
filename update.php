<?php
session_start();
$index=$_GET["index"];

$_SESSION["daftar"][$index] = [
    "nama" => $_POST["nama"],
    "umur" => $_POST["umur"],
];

header("Location: dashboardprak.php");

?>
