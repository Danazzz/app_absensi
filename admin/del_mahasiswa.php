<?php
require_once"../_config/config.php";

$id = @$_GET['id'];
$sql = "SELECT * FROM tb_user
INNER JOIN tb_mahasiswa ON tb_user.id_user = tb_mahasiswa.id_user
WHERE id_mahasiswa='$id'
";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$gambar= $data['gambar'];
$path = "../_assets/uploads/".$gambar;
unlink($path);

mysqli_query($con, "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$_GET[id]'") or die(mysqli_error($con));
echo "<script>alert('Absensi telah dihapus!');window.location='data_mahasiswa.php';</script>";
?>