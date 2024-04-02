<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';
require_once $rootPath . '/models/User.php';

class AuthController
{
    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: ../index.php');
                exit;
            } else {
                $error = 'Username atau password salah';
            }
        }

        require_once '../views/auth/login.php';
    }

    public function register()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if (User::createUser($name, $username, $email, $password)) {
                header('Location: login.php');
                exit;
            } else {
                $error = 'Terjadi kesalahan saat mendaftarkan user baru';
            }
        }

        require_once '../views/auth/register.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ../auth/login.php');
        exit;
    }
}
