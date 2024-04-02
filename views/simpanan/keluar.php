<?php
require_once '../../controllers/SimpananController.php';
require_once '../layouts/header.php';

$simpananController = new SimpananController();
$pembacaMeters = $simpananController->keluar();
$simpananMasuks = $simpananController->keluar();
?>

<h1>Simpanan Keluar</h1>

<form action="../../controllers/SimpananController.php?action=storeKeluar" method="post">
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
        <select id="bulan" name="bulan" required>
            <?php foreach ($simpananMasuks as $sm) : ?>
                <option value="<?php echo $sm['bulan']; ?>"><?php echo date('F Y', strtotime($sm['bulan'])); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="jml">Jumlah:</label>
        <input type="number" id="jml" name="jml" required>
    </div>
    <button type="submit">Simpan</button>
</form>

<?php require_once '../layouts/footer.php'; ?>