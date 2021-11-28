<?php
require_once "../_config/config.php";

if(isset($_POST['absen'])) {
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $user = $_SESSION['user'];
    $query = "SELECT * FROM tb_mahasiswa
        INNER JOIN tb_user ON tb_mahasiswa.id_user = tb_user.id_user
        WHERE tb_mahasiswa.username = '$user'
    ";
    $sql_absensi = mysqli_query($con, $query) or die(mysqli_error($con));
    $data = mysqli_fetch_array($sql_absensi);
    $id_user = $data['id_user'];
    
    mysqli_query($con,"INSERT INTO tb_absensi (id_user, ket) VALUES ('$id_user', 'Hadir')") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data.php';</script>";
}
?>