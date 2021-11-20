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
							<th>Tanggal</th>
							<th>Nama</th>
							<th>Jabatan</th>
							<th>Keterangan</th>
							<th>Waktu Masuk</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$query = "SELECT * FROM tb_absensi
							INNER JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
							ORDER BY s_in DESC
						";
						$sql_absensi = mysqli_query($con, $query) or die(mysqli_error($con));
						while($data = mysqli_fetch_array($sql_absensi)){ ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['id_user'] ?></td>
								<td><?= tgl_indo($data['tgl']); ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['status'] ?></td>
								<td><?= $data['ket'] ?></td>
								<td><?= $data['s_in'] ?></td>
							</tr>
						<?php
						} ?>
					</tbody>
				</table>
			</div>
		</form>
	</div>

	<script>
		$(document).ready(function(){
			$('#absensi').DataTable({
				columnDefs: [{
					"searchable": false,
					"orderable": false,
					"targets": 8
				}],
				"order": [0, "asc"]
			})
		});
	</script>

<?php include_once('../_footer.php'); ?>