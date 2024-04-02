<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SimpanPM</title>
    <link rel="stylesheet" href="/simpanpm/assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/simpanpm/views/index.php">Beranda</a></li>
                <?php if ($is_logged_in) : ?>
                    <li><a href="/simpanpm/views/pembaca_meter/index.php">Pembaca Meter</a></li>
                    <li><a href="/simpanpm/views/simpanan/masuk.php">Simpanan Masuk</a></li>
                    <li><a href="/simpanpm/views/simpanan/keluar.php">Simpanan Keluar</a></li>
                    <li><a href="/simpanpm/views/simpanan/saldo.php">Saldo Simpanan</a></li>
                    <li><a href="/simpanpm/views/user/index.php">Pengguna</a></li>
                    <li><a href="/simpanpm/controllers/AuthController.php?action=logout">Logout</a></li>
                <?php else : ?>
                    <li><a href="/simpanpm/views/auth/login.php">Login</a></li>
                    <li><a href="/simpanpm/views/auth/register.php">Registrasi</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>