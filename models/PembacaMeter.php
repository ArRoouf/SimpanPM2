<?php
$rootPath = realpath(dirname(__FILE__) . '/../');
require_once $rootPath . '/config/database.php';

class PembacaMeter
{
    public static function getAllPembacaMeters()
    {
        global $conn;
        $query = "SELECT * FROM pembaca_meter";
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function getPembacaMeterById($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM pembaca_meter WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function createPembacaMeter($nama_pm, $unit_pm, $foto)
    {
        global $conn;
        $foto_name = $foto['name'];
        $foto_tmp = $foto['tmp_name'];
        $foto_path = '../assets/img/' . $foto_name;
        move_uploaded_file($foto_tmp, $foto_path);

        $stmt = $conn->prepare("INSERT INTO pembaca_meter (nama_pm, unit_pm, foto, jml_sr) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("sss", $nama_pm, $unit_pm, $foto_path);
        return $stmt->execute();
    }

    public static function updatePembacaMeter($id, $nama_pm, $unit_pm, $foto)
    {
        global $conn;
        $foto_name = $foto['name'];
        $foto_tmp = $foto['tmp_name'];
        $foto_path = '../assets/img/' . $foto_name;
        move_uploaded_file($foto_tmp, $foto_path);

        $stmt = $conn->prepare("UPDATE pembaca_meter SET nama_pm = ?, unit_pm = ?, foto = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama_pm, $unit_pm, $foto_path, $id);
        return $stmt->execute();
    }

    public static function deletePembacaMeter($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM pembaca_meter WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
