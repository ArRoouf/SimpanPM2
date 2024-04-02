<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';
require_once $rootPath . '/models/PembacaMeter.php';

class PembacaMeterController
{
    public function index()
    {
        global $rootPath;
        $pembacaMeters = PembacaMeter::getAllPembacaMeters();
        return $pembacaMeters;

        require_once $rootPath . '/views/pembaca_meter/index.php';
    }

    public function create()
    {
        global $rootPath;
        require_once $rootPath . '/views/pembaca_meter/create.php';
    }

    public function store()
    {
        $nama_pm = $_POST['nama_pm'];
        $unit_pm = $_POST['unit_pm'];
        $foto = $_FILES['foto'];

        if (PembacaMeter::createPembacaMeter($nama_pm, $unit_pm, $foto)) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Terjadi kesalahan saat membuat pembaca meter baru';
        }
    }

    public function edit($id)
    {
        $pembacaMeter = PembacaMeter::getPembacaMeterById($id);
        return $pembacaMeter;

        require_once $rootPath . '/views/pembaca_meter/edit.php';
    }

    public function update($id)
    {
        $nama_pm = $_POST['nama_pm'];
        $unit_pm = $_POST['unit_pm'];
        $foto = $_FILES['foto'];

        if (PembacaMeter::updatePembacaMeter($id, $nama_pm, $unit_pm, $foto)) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Terjadi kesalahan saat memperbarui data pembaca meter';
        }
    }

    public function destroy($id)
    {
        if (PembacaMeter::deletePembacaMeter($id)) {
            header('Location: index.php');
            exit;
        } else {
            echo 'Terjadi kesalahan saat menghapus data pembaca meter';
        }
    }
}
