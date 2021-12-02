<?php
include_once('header.php');
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
			$query = mysqli_query($con, "SELECT * FROM tb_absensi WHERE id_absensi='$id'") or die(mysqli_error($con));
			$data = mysqli_fetch_array($query);
			?>
			<form action="proses.php" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?= $data['tgl'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="s_in">Waktu Masuk</label>
                    <input type="time" name="s_in" id="s_in" class="form-control" value="<?= $data['s_in'] ?>" required="">
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <select name="ket" id="ket" class="form-control">
						<?php
						if($data['ket'] == "Hadir"){ ?>
							<option value="hadir" selected>Hadir</option>
							<option value="izin">Izin</option>
							<option value="sakit">Sakit</option>
						<?php
						} else if($data['ket'] == "Izin"){ ?>
							<option value="izin" selected>Izin</option>
							<option value="hadir">Hadir</option>
							<option value="sakit">Sakit</option>
						<?php
						} else if($data['ket'] == "Sakit"){ ?>
							<option value="sakit" selected>sakit</option>
							<option value="hadir">Hadir</option>
							<option value="izin">Izin</option>
						<?php	
						}
						?>
                    </select>
                </div>
				<div class="form-group">
					<input type="reset" name="reset" value="Reset" class="btn btn-default">
					<input type="submit" name="edit_absensi" value="Simpan" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>
