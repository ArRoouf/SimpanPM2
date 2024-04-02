<?php
require_once 'layouts/header.php';

// Cek apakah pengguna sudah login
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth/login.php');
    exit;
}
?>

<h1>Selamat Datang di Aplikasi SimpanPM</h1>
<p>Silakan pilih menu di atas untuk mulai menggunakan aplikasi.</p>

<?php require_once 'layouts/footer.php'; ?>