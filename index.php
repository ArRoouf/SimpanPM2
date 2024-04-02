<?php
// Mengaktifkan pelaporan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Memulai sesi
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: /simpanpm/views/auth/login.php');
    exit;
}

// Mendapatkan path direktori saat ini
$currentDir = dirname(__FILE__);
$rootPath = realpath($currentDir . '/..');

// Mendapatkan permintaan URL
$request = $_SERVER['REQUEST_URI'];

// Memisahkan URL menjadi bagian-bagian
$urlParts = explode('/', ltrim($request, '/'));

// Mendapatkan controller dan action dari URL
$controller = isset($urlParts[1]) ? $urlParts[1] : 'index';
$action = isset($urlParts[2]) ? $urlParts[2] : 'index';

// Mengakses file controller yang sesuai
$controllerFile = $rootPath . '/controllers/' . $controller . 'Controller.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerName = ucfirst($controller) . 'Controller';
    $controllerInstance = new $controllerName();
    if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
    } else {
        echo 'Aksi tidak ditemukan';
    }
} else {
    echo 'Controller tidak ditemukan';
}
