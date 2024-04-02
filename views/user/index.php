<?php
require_once '../../controllers/AuthController.php';
require_once '../layouts/header.php';

$authController = new AuthController();
$users = $authController->getAllUsers();
?>

<h1>Daftar Pengguna</h1>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><img src="<?php echo $user['photo']; ?>" alt="Foto Profil" width="100"></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <a href="../../controllers/AuthController.php?action=deleteUser&id=<?php echo $user['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="create.php">Tambah Pengguna</a>

<?php require_once '../layouts/footer.php'; ?>