<?php
session_start();

// Redirect ke login jika belum login
if (!isset($_SESSION['username'])) {
    header("Location: loginprak.php");
    exit();
}

$username = $_SESSION['username'];

// Hitung jumlah login
$file = "login_count_{$username}.txt";
$count = file_exists($file) ? (int)file_get_contents($file) : 0;
$count++;
file_put_contents($file, $count);

// Inisialisasi daftar jika belum ada
if (!isset($_SESSION["daftar"])) {
    $_SESSION["daftar"] = [];
}

// Menyimpan data baru
if (isset($_POST["nama"]) && isset($_POST["umur"]) && is_numeric($_POST["umur"])) {
    $daftar = [
        "nama" => $_POST["nama"],
        "umur" => $_POST["umur"]
    ];
    $_SESSION["daftar"][] = $daftar;
}

// Untuk form update
$data_daftar = [
    "nama" => "",
    "umur" => "",
];
$target = "dashboardprak.php";

if (isset($_GET["index"])) {
    $target = "update.php?index=" . $_GET["index"];
    if ($_GET["index"] !== null) {
        $index = $_GET["index"];
        $data_daftar = $_SESSION["daftar"][$index];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>::Login Page::</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, rgb(87, 118, 243), rgb(31, 72, 238));
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: start;
            min-height: 100vh;
            margin: 0;
            padding-top: 50px;
        }

        table {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            border: 3px solid white;
            border-radius: 10px;
            padding: 20px;
            margin: 15px 0;
        }

        td {
            padding: 5px 10px;
        }

        input[type="text"] {
            padding: 5px;
            border: none;
            border-radius: 5px;
            width: 180px;
        }

        button {
            background-color: rgb(65, 93, 206);
            padding: 8px 14px;
            border-radius: 5px;
            color: white;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        #logout {
            background-color: darkred;
        }

        h1 {
            color: black;
            margin-bottom: 30px;
        }

        a {
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1><?php echo "Selamat datang " . htmlspecialchars($username) . " ke-" . $count; ?></h1>

    <!-- FORM INPUT -->
    <form action="<?php echo $target; ?>" method="post">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;"><strong>DAFTAR</strong></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?php echo htmlspecialchars($data_daftar["nama"]); ?>" required></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td><input type="text" name="umur" value="<?php echo htmlspecialchars($data_daftar["umur"]); ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">SUBMIT</button>
                    <a href="logoutprak.php"><button id="logout" type="button">LOGOUT</button></a>
                </td>
            </tr>
        </table>
    </form>

    <!-- TABEL DAFTAR -->
    <table border="1">
        <tr>
            <td><strong>Nama</strong></td>
            <td><strong>Umur</strong></td>
            <td><strong>Keterangan</strong></td>
            <td><strong>Aksi</strong></td>
        </tr>
        <?php foreach ($_SESSION["daftar"] as $index => $daftar): ?>
            <tr>
                <td><?php echo htmlspecialchars($daftar["nama"]); ?></td>
                <td><?php echo htmlspecialchars($daftar["umur"]); ?></td>
                <td>
                    <?php
                        $umur = $daftar["umur"];
                        if ($umur < 20) {
                            echo "Remaja";
                        } elseif ($umur >= 20 && $umur < 40) {
                            echo "Dewasa";
                        } elseif ($umur >= 40) {
                            echo "Tua";
                        } else {
                            echo "Tidak Diketahui";
                        }
                    ?>
                </td>
                <td>
                    <a href="hapus.php?index=<?php echo $index; ?>">delete</a>
                    <a href="dashboardprak.php?index=<?php echo $index; ?>">update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
