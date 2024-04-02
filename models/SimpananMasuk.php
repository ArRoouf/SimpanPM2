<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';

class SimpananMasuk
{
    public static function createSimpananMasuk($nama_pm, $bulan, $sr, $jml_rupiah)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO simpanan_masuk (nama_pm, bulan, sr, jml_rupiah) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $nama_pm, $bulan, $sr, $jml_rupiah);
        return $stmt->execute();
    }

    public static function getAllSimpananMasuks()
    {
        global $conn;
        $query = "SELECT * FROM simpanan_masuk";
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getSaldoSimpanan($nama_pm = null, $tahun = null)
    {
        global $conn;
        $query = "SELECT sm.bulan, sm.sr, sm.jml_rupiah, COALESCE(sk.jml, 0) AS jml_keluar, 
                    (SELECT COALESCE(SUM(jml_rupiah) - SUM(COALESCE(sk2.jml, 0)), 0)
                     FROM simpanan_masuk sm2
                     LEFT JOIN simpanan_keluar sk2 ON sm2.nama_pm = sk2.nama_pm AND sm2.bulan = sk2.bulan
                     WHERE sm2.nama_pm = sm.nama_pm AND sm2.bulan < sm.bulan " .
            ($tahun ? "AND YEAR(sm2.bulan) = $tahun" : "") . "
                     GROUP BY sm2.nama_pm, sm2.bulan
                     ORDER BY sm2.bulan DESC
                     LIMIT 1) AS saldo_sebelumnya
                  FROM simpanan_masuk sm
                  LEFT JOIN simpanan_keluar sk ON sm.nama_pm = sk.nama_pm AND sm.bulan = sk.bulan " .
            ($nama_pm ? "WHERE sm.nama_pm = '$nama_pm'" : "") .
            ($tahun ? " AND YEAR(sm.bulan) = $tahun" : "") . "
                  ORDER BY sm.bulan";

        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
