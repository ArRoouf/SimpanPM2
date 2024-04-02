<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';
require_once $rootPath . '/models/PembacaMeter.php';
require_once $rootPath . '/models/SimpananMasuk.php';
require_once $rootPath . '/models/SimpananKeluar.php';

class SimpananController
{
    public function masuk()
    {
        $pembacaMeters = PembacaMeter::getAllPembacaMeters();
        require_once '../views/simpanan/masuk.php';
    }

    public function storeMasuk()
    {
        $nama_pm = $_POST['nama_pm'];
        $bulan = $_POST['bulan'];
        $sr = $_POST['sr'];

        $jml_rupiah = $sr * 900;

        if (SimpananMasuk::createSimpananMasuk($nama_pm, $bulan, $sr, $jml_rupiah)) {
            header('Location: saldo.php');
            exit;
        } else {
            echo 'Terjadi kesalahan saat menyimpan data simpanan masuk';
        }
    }

    public function keluar()
    {
        $pembacaMeters = PembacaMeter::getAllPembacaMeters();
        $simpananMasuks = SimpananMasuk::getAllSimpananMasuks();
        require_once '../views/simpanan/keluar.php';
    }

    public function storeKeluar()
    {
        $nama_pm = $_POST['nama_pm'];
        $bulan = $_POST['bulan'];
        $jml = $_POST['jml'];

        if (SimpananKeluar::createSimpananKeluar($nama_pm, $bulan, $jml)) {
            header('Location: saldo.php');
            exit;
        } else {
            echo 'Terjadi kesalahan saat menyimpan data simpanan keluar';
        }
    }

    public function saldo()
    {
        $pembacaMeters = PembacaMeter::getAllPembacaMeters();
        $nama_pm = isset($_GET['nama_pm']) ? $_GET['nama_pm'] : null;
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : null;

        $saldos = SimpananMasuk::getSaldoSimpanan($nama_pm, $tahun);

        require_once '../views/simpanan/saldo.php';
    }
}
