<?php
require_once "../_config/config.php";
if(isset($_SESSION['user'])){
    echo "<script>window.location='".base_url()."';</script>";
}
else{
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Absensi KEPENG &mdash; Sign Up</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/simple-sidebar/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('_assets/kepeng.png');?>"
</head>
<body>
    <div class="box">
        <h1>Sign Up</h1>
        <h4>
            <div class="pull-right">
                <a href="login.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <form action="proses.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama<Pas/label>
                        <input type="text" name="nama" id="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="jkel">Jenis Kelamin</label>
                        <div>
						    <label class="radio-inline">
							    <input type="radio" name="jkel" id="jkel" value="L" required=""> Laki - laki
						    </label>
						    <label class="radio-inline">
							    <input type="radio" name="jkel" id="jkel" value="P"> Perempuan
						    </label>
					    </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat<Pas/label>
                        <textarea name="alamat" id="alamat" class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" name="no_telp" id="no_telp" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="telp">Instansi</label>
                        <input type="text" name="instansi" id="instansi" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Pilih foto untuk diupload</label>
                        <input type="file" name="gambar">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Simpan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?=base_url('_assets/simple-sidebar/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/simple-sidebar/js/bootstrap.min.js')?>"></script>
</body>
</html>
<?php
}
?>