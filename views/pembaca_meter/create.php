<?php
require_once '../layouts/header.php';
?>

<h1>Tambah Pembaca Meter</h1>

<form action="../../controllers/PembacaMeterController.php?action=store" method="post" enctype="multipart/form-data">
    <div>
        <label for="nama_pm">Nama Pembaca Meter:</label>
        <input type="text" id="nama_pm" name="nama_pm" required>
    </div>
    <div>
        <label for="unit_pm">Unit Pembaca Meter:</label>
        <input type="text" id="unit_pm" name="unit_pm" required>
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" required>
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>