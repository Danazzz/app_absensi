<?php include_once('../_header.php'); ?>

	<div class="box">
		<h1>History Absen</h1>
		<h4>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
			</div>
		</h4>
		<form method="post" name="proses">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="absensi">
					<thead>
						<tr>
							<th>No.</th>
							<th>No. ID</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Waktu Masuk</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$user = $_SESSION['user'];
						$query = "SELECT * FROM tb_absensi
							INNER JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
							INNER JOIN tb_mahasiswa ON tb_absensi.id_user = tb_mahasiswa.id_user
							WHERE tb_mahasiswa.username = '$user'
							ORDER BY s_in ASC
						";
						$sql_absensi = mysqli_query($con, $query) or die(mysqli_error($con));
						while($data = mysqli_fetch_array($sql_absensi)){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['id_user'] ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= tgl_indo($data['tgl']); ?></td>
								<td><?= $data['s_in'] ?></td>
								<td><?= $data['ket'] ?></td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>

<?php include_once('../_footer.php'); ?>