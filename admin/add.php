<?php
include_once('header.php');
?>

<div class="box">
	<h1>Tambah Absensi</h1>
	<h4>
		<div class="pull-right">
			<a href="index.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<form action="proses.php" method="post">
                <div class="form-group">
                    <label for="identitas">Nomor Identitas</label>
                    <select name="identitas" id="identitas" class="form-control" required="">
                        <option value="">- Pilih -</option>
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM tb_mahasiswa ORDER BY id_user ASC") or die(mysqli_error($con));
                        while($data_identitas = mysqli_fetch_array($query)){
                            if($data['id_user'] == $data_identitas['id_user']){
                                $select = "selected";
                            }
                            else{
                                $select = "";
                            }
                            echo '<option '.$select.' value="'.$data_identitas['id_user'].'">'.$data_identitas['id_user'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl">Tanggal</label>
                    <input type="date" name="tgl" id="tgl" class="form-control" value="<?= date('Y-m-d') ?>" required="">
                </div>
                <div class="form-group">
                    <label for="s_in">Waktu Masuk</label>
                    <input type="time" name="s_in" id="s_in" class="form-control" value="<?= date('H:i:s') ?>" required="">
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <select name="ket" id="ket" class="form-control" required="">
						<option value="">- Pilih -</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>
				<div class="form-group">
					<input type="submit" name="add" value="Simpan" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>