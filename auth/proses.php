<?php
require_once "../_config/config.php";


if(isset($_POST['add'])) {
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
    $jkel = trim(mysqli_real_escape_string($con, $_POST['jkel']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $instansi = trim(mysqli_real_escape_string($con, $_POST['instansi']));
    $gambar =  $_FILES['gambar']['name'];

    if (strlen($gambar)>0) {
        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
            move_uploaded_file ($_FILES['gambar']['tmp_name'], "../_assets/uploads/".$gambar);
        }
    }

    mysqli_query($con,"INSERT INTO tb_user(id_user, username, password, role ) VALUES ( '$identitas', '$username', '$password', 'mahasiswa')") or die (mysqli_error($con));
    mysqli_query($con,"INSERT INTO tb_mahasiswa(id_mahasiswa, id_user, nama, username, jkel, alamat, no_telp, instansi, gambar) VALUES ('', '$identitas', '$nama', '$username', '$jkel', '$alamat', '$no_telp', '$instansi', '$gambar')") or die (mysqli_error($con));
    echo "<script>alert('Data berhasil ditambah');window.location='login.php';</script>";
}
?>