<?php include "koneksi.php";
include "oop/oop_select.php";
include "oop/oop_insert.php";
include "oop/oop_update.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // siswa
    if (isset($_GET["id_siswa"])) {
        $id = $_GET["id_siswa"];
        $stmt = $connected->prepare($select->selectTable($tableName = "siswa", $fields = "*", $condition = "WHERE id_siswa = ?"));
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $result = $connected->query($select->selectTable($tableName = "siswa", $fields = "*", $condition = ""));

        $data = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['no'] = $i;
            $row['aksi'] = '<button class="edit btn btn-primary" data-id="' . $row['id_siswa'] . '"><i class="fa-solid fa-pen"></i></button>
            <button class="delete btn btn-danger" data-id="' . $row['id_siswa'] . '"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></button>';
            $data[] = $row;
        }

        echo json_encode(["data" => $data]);
    }

} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['filterNama']) || isset($_POST['filterKelas']) || isset($_POST['filterJurusan']) || isset($_POST['filterAlamat'])) {
        $query = "SELECT * FROM siswa WHERE 1=1"; // inisialisasi query

        $filterNama = $_POST['filterNama'];
        $filterKelas = $_POST['filterKelas'];
        $filterJurusan = $_POST['filterJurusan'];
        $filterAlamat = $_POST['filterAlamat'];

        // urutkan berdasarkan abjad
        if ($filterNama == 1) {
            $query .= " ORDER BY nama ASC";
        } else if ($filterKelas == 1) {
            $query .= " ORDER BY kelas ASC";
        } else if ($filterJurusan == 1) {
            $query .= " ORDER BY jurusan ASC";
        } else if ($filterAlamat == 1) {
            $query .= " ORDER BY alamat ASC";
        }

        // Jalankan query
        $result = mysqli_query($connected, $query);

        $dataFilter = [];

        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            $row['no'] = $i;
            $row['aksi'] = '<button class="edit btn btn-primary" data-id="' . $row['id_siswa'] . '"><i class="fa-solid fa-pen"></i></button>
        <button class="delete btn btn-danger" data-id="' . $row['id_siswa'] . '"><i class="fa-solid fa-trash-can" style="color: #ffffff;"></i></button>';
            $dataFilter[] = $row;
        }

        echo json_encode(["data" => $dataFilter]);
    } else {

        // tambah siswa
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $jurusan = $_POST["jurusan"];
        $alamat = $_POST["alamat"];

        $stmt = $connected->prepare("INSERT INTO siswa (nis, nama, kelas, jurusan, alamat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $nis, $nama, $kelas, $jurusan, $alamat);

        if ($stmt->execute()) {
            echo "Completed" . $stmt->error;
        } else {
            echo "Failed: " . $stmt->error;
        }
        $stmt->close();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {
    // Edit user
    parse_str(file_get_contents("php://input"), $data);
    $id = $data["id_siswa"];
    $nis = $data["nis"];
    $nama = $data["nama"];
    $kelas = $data["kelas"];
    $jurusan = $data["jurusan"];
    $alamat = $data["alamat"];

    $stmt = $connected->prepare("UPDATE siswa SET nis = ?, nama = ?, kelas = ?, jurusan = ?, alamat = ? WHERE id_siswa = ?");
    $stmt->bind_param("issssi", $nis, $nama, $kelas, $jurusan, $alamat, $id);

    if ($stmt->execute()) {
        echo "User Edited";
    } else {
        echo "Failed " . $stmt->error;
    }

    $stmt->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    // Delete siswa
    parse_str(file_get_contents("php://input"), $data);
    $id = $data["id_siswa"];

    $stmt = $connected->prepare("DELETE FROM siswa WHERE id_siswa = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "User deleted";
    } else {
        echo "Failed: " . $stmt->error;
    }

    $stmt->close();
}

