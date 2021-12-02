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
    $gambar =  $_FILES['gambar']['name'];
    if (strlen($gambar)>0) {
        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
            move_uploaded_file ($_FILES['gambar']['tmp_name'], "C:/xampp/htdocs/app_absensi/_assets/uploads/".$gambar);
        }
    }

    // function upload(){
    //     $namaFile = $_FILES['gambar']['name'];
    //     $ukuranFIle = $_FILES['gambar']['size'];
    //     $error = $_FILES['gambar']['error'];
    //     $tmpName = $_FILES['gambar']['tmp_name'];
    //     $formatGambar = ['jpg','jpeg','png'];
    //     $format = explode('.', $namaFile);
    //     $format = strtolower(end($format));

    //     if($error === 4){
    //         echo "<script>alert ('Gambar tidak ada!')</script>";
    //         return false;
    //     }

    //     if(!in_array($format,$formatGambar)){
    //         echo "<script>alert ('yang anda upload bukan gambar!')</script>";
    //         return false;
    //     }

    //     if($ukuranFIle > 10000000){
    //         echo "<script>alert ('Ukuran terlalu besar!')</script>";
    //         return false;
    //     }

    //     move_uploaded_file($tmpName,'C:\xampp\htdocs\app_absensi\_assets\uploads' . $namaFile);
    //     return $namaFile;
    // }

    // $gambar = upload();
    // if(!$gambar){
    //     return false;
    // } else {

    mysqli_query($con,"UPDATE tb_user SET username = '$username', password = '$password' WHERE id_user = '$id'") or die (mysqli_error($con));
    mysqli_query($con,"UPDATE tb_mahasiswa SET nama = '$nama', username = '$username', jkel = '$jkel', alamat = '$alamat', no_telp = '$no_telp', instansi = '$instansi', gambar = '$gambar' WHERE id_user = '$id'") or die (mysqli_error($con));
    echo "<script>alert('Anda telah absen');window.location='data.php';</script>";
    
}
?>