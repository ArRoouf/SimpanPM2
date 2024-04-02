<?php
require_once '../../controllers/AuthController.php';
require_once '../layouts/header.php';

$authController = new AuthController();
$id = $_GET['id'];
$user = $authController->getUserById($id);
?>

<h1>Detail Pengguna</h1>

<div>
    <p><strong>Nama:</strong> <?php echo $user['name']; ?></p>
    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><img src="<?php echo $user['photo']; ?>" alt="Foto Profil" width="200"></p>
</div>

<a href="index.php">Kembali</a>

<?php require_once '../layouts/footer.php'; ?>