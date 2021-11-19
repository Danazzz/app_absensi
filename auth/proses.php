<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
    $tgl_lahir = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
    $stat = trim(mysqli_real_escape_string($con, $_POST['stat']));
    mysqli_query($con,"INSERT INTO tb_user(id_user, kode_user, nama, username, pass, tgl_lahir, jk, alamat, no_telp, stat ) VALUES ('$uuid', '$identitas', '$nama', '$username', '$pass', '$tgl_lahir', '$jk', '$alamat', '$telp', '$stat')") or die (mysqli_error($con));
    echo "<script>alert('Data berhasil ditambah');window.location='login.php';</script>";
}
?>