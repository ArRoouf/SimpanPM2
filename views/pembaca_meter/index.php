<?php
require_once '../../controllers/PembacaMeterController.php';
require_once '../layouts/header.php';

$pembacaMeterController = new PembacaMeterController();
$pembacaMeters = $pembacaMeterController->index();
?>

<h1>Daftar Pembaca Meter</h1>

<table>
    <thead>
        <tr>
            <th>Nama Pembaca Meter</th>
            <th>Unit Pembaca Meter</th>
            <th>Foto</th>
            <th>Jumlah SR</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pembacaMeters as $pm) : ?>
            <tr>
                <td><?php echo $pm['nama_pm']; ?></td>
                <td><?php echo $pm['unit_pm']; ?></td>
                <td><img src="<?php echo $pm['foto']; ?>" alt="Foto Pembaca Meter" width="100"></td>
                <td><?php echo $pm['jml_sr']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $pm['id']; ?>">Edit</a>
                    <a href="../../controllers/PembacaMeterController.php?action=destroy&id=<?php echo $pm['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="create.php">Tambah Pembaca Meter</a>

<?php require_once '../layouts/footer.php'; ?>