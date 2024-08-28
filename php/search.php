<?php
include "koneksi.php";

// Ambil keyword dari AJAX
$keyword = $_GET['keyword'] ?? '';

$sql = "SELECT * FROM siswa WHERE nis LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
$result = $connected->query($sql);

$datasiswa = []; // simpan hasil dalam array

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $datasiswa[] = $row;
    }
}

echo json_encode($datasiswa);