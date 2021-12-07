<?php
// setting default timezone 
date_default_timezone_set('asia/hong_kong');

// session start
session_start();

// koneksi ke database
$con = mysqli_connect('localhost','root','','absensi');
if(mysqli_connect_errno()){
    echo mysqli_connect_error();
}

// fungsi base_url
function base_url($url = null){
    $base_url = "http://localhost/app_absensi";
    if($url != null){
        return $base_url."/".$url;
    }
    else{
        return $base_url;
    }
}

// function untuk tgl format indonesia
function tgl_indo($tgl){
	$tanggal = substr($tgl, 8, 2);
	$bulan = substr($tgl, 5, 2);
	$tahun = substr($tgl, 0, 4);

	return $tanggal."/".$bulan."/".$tahun;
}

//function upload gambar dan validasi gambar
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    $formatGambar = ['jpg','jpeg','png'];
    $format = explode('.', $namaFile);
    $format = strtolower(end($format));
    if($error === 4){
        echo "<script>alert ('Gambar tidak ada!')</script>";
        return false;
    }
    if(!in_array($format,$formatGambar)){
        echo "<script>alert ('yang anda upload bukan gambar!')</script>";
        return false;
    }
    if($ukuranFIle > 10000000){
        echo "<script>alert ('Ukuran terlalu besar!')</script>";
        return false;
    }
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $format; 
    move_uploaded_file($tmpName,'../_assets/uploads/' . $namafilebaru);
    return $namafilebaru;
}
?>