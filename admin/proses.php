<?php
require_once "../_config/config.php";

if(isset($_POST['add'])) {
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $s_in = trim(mysqli_real_escape_string($con, $_POST['s_in']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    
    mysqli_query($con,"INSERT INTO tb_absensi (id_user, tgl, s_in, ket) VALUES ('$identitas', '$tgl', '$s_in', '$ket')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='index.php';</script>";
}
else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    $s_in = trim(mysqli_real_escape_string($con, $_POST['s_in']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    
    mysqli_query($con,"UPDATE tb_absensi SET tgl = '$tgl', s_in = '$s_in', ket = '$ket' WHERE id_absensi = '$id' )") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='index.php';</script>";
}
?>