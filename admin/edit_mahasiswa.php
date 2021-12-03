<?php
include_once('header.php');
?>

<div class="box">
	<h1>Edit Profile</h1>
	<h4>
		<div class="pull-right">
			<a href="data_mahasiswa.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<?php
			$id = @$_GET['id'];
			$sql = "SELECT * FROM tb_user
			INNER JOIN tb_mahasiswa ON tb_user.id_user = tb_mahasiswa.id_user
			WHERE id_mahasiswa='$id'
			";
			$query = mysqli_query($con, $sql);
			$data = mysqli_fetch_array($query);
			?>
            <form action="proses.php" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
				<input type="hidden" name="id_user" value="<?= $data['id_user'] ?>">
                <input type="hidden" name="gambarlama" value="<?= $data['gambar'] ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" require autofocus>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="nama">Nama<Pas/label>
                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama'] ?>" required="">
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
                    <textarea name="alamat" id="alamat" class="form-control" required=""><?= $data['alamat'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="no_telp">No. Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $data['no_telp'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="telp">Instansi</label>
                    <input type="text" name="instansi" id="instansi" class="form-control" value="<?= $data['instansi'] ?>" required="">
                </div>
				<div class="form-group">
                    <label for="gambar">Ubah Foto</label>
                    <input type="file" name="gambar" id="gambar">
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit_mahasiswa" value="Simpan" class="btn btn-success">
                </div>
            </form>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>
