<?php
require_once "../_config/config.php";

if(isset($_POST['absen'])) {
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $id_user = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    
    mysqli_query($con,"INSERT INTO tb_absensi (id_user, ket) VALUES ('$id_user', 'Hadir')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data.php';</script>";
}
?>