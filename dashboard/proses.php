<?php
require_once "../_config/config.php";


if(isset($_POST['absen'])) {
    $date = date('Y-m-d');
    $time = date('H:i:s');
    
    mysqli_query($con,"INSERT INTO tb_absensi (tgl, s_in, ket) VALUES ('$date', '$time', 'Hadir')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data.php';</script>";
}
?>