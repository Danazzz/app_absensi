<?php
require_once"../_config/config.php";

mysqli_query($con, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>alert('Absensi telah dihapus!');window.location='data_mahasiswa.php';</script>";