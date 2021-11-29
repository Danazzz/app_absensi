<?php
include_once('../_header.php');
?>

<div class="box">
	<h1>Edit Profile</h1>
	<h4>
		<div class="pull-right">
			<a href="index.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<?php
			$id = @$_GET['id'];
			$sql_edit = mysqli_query($con, "SELECT * FROM tb_mahasiswa WHERE id_user='$id'") or die(mysqli_error($con));
			$data = mysqli_fetch_array($sql_edit);
			?>
			<form action="proses.php" method="post">
            <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" require autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required="">
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
					<input type="submit" name="edit" value="Simpan" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>
