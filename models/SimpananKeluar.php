<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';

class SimpananKeluar
{
    public static function createSimpananKeluar($nama_pm, $bulan, $jml)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO simpanan_keluar (nama_pm, bulan, jml) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nama_pm, $bulan, $jml);
        return $stmt->execute();
    }
}
