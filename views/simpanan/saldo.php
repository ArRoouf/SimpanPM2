<?php
require_once '../../controllers/SimpananController.php';
require_once '../layouts/header.php';

$simpananController = new SimpananController();
$pembacaMeters = $simpananController->saldo();
$nama_pm = isset($_GET['nama_pm']) ? $_GET['nama_pm'] : null;
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;
$saldos = $simpananController->saldo($nama_pm, $tahun);
?>

<h1>Saldo Simpanan</h1>

<form>
    <div>
        <label for="nama_pm">Nama Pembaca Meter:</label>
        <select id="nama_pm" name="nama_pm">
            <option value="">Pilih Pembaca Meter</option>
            <?php foreach ($pembacaMeters as $pm) : ?>
                <option value="<?php echo $pm['nama_pm']; ?>" <?php if ($nama_pm == $pm['nama_pm']) echo 'selected'; ?>><?php echo $pm['nama_pm']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="tahun">Tahun:</label>
        <input type="number" id="tahun" name="tahun" value="<?php echo $tahun; ?>" placeholder="Tahun (opsional)">
    </div>
    <button type="submit">Filter</button>
</form>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Bulan</th>
            <th>SR</th>
            <th>Rupiah</th>
            <th>Keluar</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $saldo_sebelumnya = 0;
        foreach ($saldos as $saldo) :
            $saldo_sebelumnya += $saldo['jml_rupiah'] - $saldo['jml_keluar'];
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo date('F Y', strtotime($saldo['bulan'])); ?></td>
                <td><?php echo $saldo['sr']; ?></td>
                <td><?php echo number_format($saldo['jml_rupiah'], 0, ',', '.'); ?></td>
                <td><?php echo number_format($saldo['jml_keluar'], 0, ',', '.'); ?></td>
                <td><?php echo number_format($saldo_sebelumnya, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<button onclick="window.print()">Cetak</button>

<?php require_once '../layouts/footer.php'; ?>