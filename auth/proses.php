<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    mysqli_query($con,"INSERT INTO tb_pasien(id_pasien, nomor_identitas, nama_pasien, jenis_kelamin, alamat, no_telp ) VALUES ('$uuid', '$identitas', '$nama', '$jk', '$alamat', '$telp')") or die (mysqli_error($con));
    echo "<script>alert('Data berhasil ditambah');window.location='data.php';</script>";
}
?>