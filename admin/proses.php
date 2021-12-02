<?php
require_once "../_config/config.php";

if(isset($_POST['add_absensi'])) {
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $s_in = trim(mysqli_real_escape_string($con, $_POST['s_in']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con,"INSERT INTO tb_absensi (id_user, tgl, s_in, ket) VALUES ('$identitas', '$tgl', '$s_in', '$ket')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='index.php';</script>";
}
else if(isset($_POST['edit_absensi'])) {
    $id = $_POST['id'];
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $s_in = trim(mysqli_real_escape_string($con, $_POST['s_in']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con,"UPDATE tb_absensi SET tgl = '$tgl', s_in = '$s_in', ket = '$ket' WHERE id_absensi = '$id'") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='index.php';</script>";
}
else if(isset($_POST['add_mahasiswa'])) {
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
    echo "<script>alert('Data berhasil ditambah');window.location='data_mahasiswa.php';</script>";
}
else if(isset($_POST['edit_mahasiswa'])) {
    $id = $_POST['id'];
    $id_user = $_POST['id_user'];
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
    mysqli_query($con,"UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = '$id'") or die (mysqli_error($con));
    mysqli_query($con,"UPDATE tb_mahasiswa SET nama = '$nama', username = '$username', jkel = '$jkel', alamat = '$alamat', no_telp = '$no_telp', instansi = '$instansi', gambar = '$gambar' WHERE id_mahasiswa = '$id'") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data_mahasiswa.php';</script>";
}
?>