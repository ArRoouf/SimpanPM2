<?php
require_once '../../controllers/PembacaMeterController.php';
require_once '../layouts/header.php';

$pembacaMeterController = new PembacaMeterController();
$id = $_GET['id'];
$pembacaMeter = $pembacaMeterController->edit($id);
?>

<h1>Edit Pembaca Meter</h1>

<form action="../../controllers/PembacaMeterController.php?action=update&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="nama_pm">Nama Pembaca Meter:</label>
        <input type="text" id="nama_pm" name="nama_pm" value="<?php echo $pembacaMeter['nama_pm']; ?>" required>
    </div>
    <div>
        <label for="unit_pm">Unit Pembaca Meter:</label>
        <input type="text" id="unit_pm" name="unit_pm" value="<?php echo $pembacaMeter['unit_pm']; ?>" required>
    </div>
    <div>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto">
        <img src="<?php echo $pembacaMeter['foto']; ?>" alt="Foto Pembaca Meter" width="100">
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>