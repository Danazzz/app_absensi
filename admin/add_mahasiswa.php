<?php
include_once('header.php');
?>

<div class="box">
	<h1>Tambah Absensi</h1>
	<h4>
		<div class="pull-right">
			<a href="data_mahasiswa.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" require autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="identitas">Nomor Identitas</label>
                    <input type="number" name="identitas" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="nama">Nama<Pas/label>
                    <input type="text" name="nama" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="jkel">Jenis Kelamin</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="jkel" id="jkelL" value="L" required=""> Laki - laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="jkel" id="jkelP" value="P"> Perempuan
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat<Pas/label>
                    <textarea name="alamat" class="form-control" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telepon</label>
                    <input type="tel" name="no_telp" class="form-control" placeholder="088888888888" pattern="[0-9]{12}" required="">
                </div>
                <div class="form-group">
                    <label for="telp">Instansi</label>
                    <input type="text" name="instansi" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="gambar">Pilih foto untuk diupload:</label>
                    <input type="file" name="gambar" required="">
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add_mahasiswa" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>