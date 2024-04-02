<?php
require_once '../layouts/header.php';
?>

<h1>Tambah Pengguna</h1>

<form action="../../controllers/AuthController.php?action=createUser" method="post" enctype="multipart/form-data">
    <div>
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div>
        <label for="photo">Foto:</label>
        <input type="file" id="photo" name="photo" required>
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>