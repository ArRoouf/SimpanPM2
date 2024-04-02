<?php
require_once '../../controllers/SimpananController.php';
require_once '../layouts/header.php';

$simpananController = new SimpananController();
$pembacaMeters = $simpananController->masuk();
?>

<h1>Simpanan Masuk</h1>

<form action="../../controllers/SimpananController.php?action=storeMasuk" method="post">
    <div>
        <label for="nama_pm">Nama Pembaca Meter:</label>
        <select id="nama_pm" name="nama_pm" required>
            <?php foreach ($pembacaMeters as $pm) : ?>
                <option value="<?php echo $pm['nama_pm']; ?>"><?php echo $pm['nama_pm']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="bulan">Bulan:</label>
        <input type="month" id="bulan" name="bulan" required>
    </div>
    <div>
        <label for="sr">SR:</label>
        <input type="number" id="sr" name="sr" required>
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>