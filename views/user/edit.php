<?php
require_once '../../controllers/AuthController.php';
require_once '../layouts/header.php';

$authController = new AuthController();
$id = $_GET['id'];
$user = $authController->getUserById($id);
?>

<h1>Edit Pengguna</h1>

<form action="../../controllers/AuthController.php?action=updateUser&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
    </div>
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <small>Biarkan kosong jika tidak ingin mengubah password</small>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo">
        <img src="<?php echo $user['photo']; ?>" alt="Foto Profil" width="100">
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>