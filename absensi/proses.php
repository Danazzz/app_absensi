<?php
require_once "../_config/config.php";


if(isset($_POST['absen'])) {
    $date = date('Y-m-d H:i:s');
    mysqli_query($con,"INSERT INTO `table` (`dateposted`) VALUES ('$date')");
    echo "<script>alert('Data berhasil ditambah');window.location='data.php';</script>";
}
?>