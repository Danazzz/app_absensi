<?php
require_once "../_config/config.php";

if(isset($_POST['absen'])) {
    $user = $_SESSION['user'];
    $query = "SELECT * FROM tb_mahasiswa
        INNER JOIN tb_user ON tb_mahasiswa.id_user = tb_user.id_user
        WHERE tb_mahasiswa.username = '$user'
    ";
    $sql_absensi = mysqli_query($con, $query) or die(mysqli_error($con));
    $data = mysqli_fetch_array($sql_absensi);
    $id_user = $data['id_user'];
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    mysqli_query($con,"INSERT INTO tb_absensi (id_user, ket) VALUES ('$id_user', '$ket')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data.php';</script>";
}
else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
    $jkel = trim(mysqli_real_escape_string($con, $_POST['jkel']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $no_telp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));
    $instansi = trim(mysqli_real_escape_string($con, $_POST['instansi']));
    $gambarlama = trim(mysqli_real_escape_string($con, $_POST['gambarlama']));
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    mysqli_query($con,"UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = '$id'") or die (mysqli_error($con));
    mysqli_query($con,"UPDATE tb_mahasiswa SET nama = '$nama', username = '$username', jkel = '$jkel', alamat = '$alamat', no_telp = '$no_telp', instansi = '$instansi', gambar = '$gambar' WHERE id_user = '$id'") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='index.php';</script>";
}
?>