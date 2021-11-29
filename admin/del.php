<?php
require_once"../_config/config.php";

mysqli_query($con, "DELETE FROM tb_absensi WHERE id_user = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>alert('Absensi telah dihapus!');window.location='index.php';</script>";