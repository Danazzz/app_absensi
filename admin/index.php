<?php include_once('header.php'); ?>

    <div class="box">
		<h1>History Absensi Mahasiswa</h1>
		<h4>
			<div class="pull-right">
				<a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
				<a href="add_absensi.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Absensi</a>
			</div>
		</h4>
		<div style="margin-bottom:10px;">
			<form class="form-inline" action="" method="post">
				<div class="form-group">
					<input type="text" name="pencarian" class="form-control" placeholder="Pencarian...">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</div>
			</form>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
						<th>No. ID</th>
						<th>Nama</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Keterangan</th>
						<th><i class="glyphicon glyphicon-cog"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$batas = 10;
						$hal = @$_GET['hal'];
						if(empty($hal)){
							$posisi = 0;
							$hal = 1;
						}
						else{
							$posisi = ($hal - 1) * $batas;
						}
						$no = 1;
						if($_SERVER['REQUEST_METHOD'] == "POST"){
							$pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
							if($pencarian != ''){
                                $sql = "SELECT * FROM tb_absensi
                                INNER JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
                                INNER JOIN tb_mahasiswa ON tb_absensi.id_user = tb_mahasiswa.id_user
                                WHERE tb_mahasiswa.nama = '%$pencarian%'
                                ORDER BY tgl DESC, s_in DESC
								";
								$query = $sql;
								$query_jml = $sql;
							}
							else{
								$query = "SELECT * FROM tb_absensi
                                INNER JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
                                INNER JOIN tb_mahasiswa ON tb_absensi.id_user = tb_mahasiswa.id_user 
                                ORDER BY tgl DESC, s_in DESC
                                LIMIT $posisi, $batas";
								$query_jml = "SELECT * FROM tb_absensi";
								$no = $posisi + 1;
							}
						}
						else{
							$query = "SELECT * FROM tb_absensi
                            INNER JOIN tb_user ON tb_absensi.id_user = tb_user.id_user
                            INNER JOIN tb_mahasiswa ON tb_absensi.id_user = tb_mahasiswa.id_user 
                            ORDER BY tgl DESC, s_in DESC
                            LIMIT $posisi, $batas";
							$query_jml = "SELECT * FROM tb_absensi";
							$no = $posisi + 1;
						}
						
						$sql = mysqli_query($con, $query) or die(mysqli_error($con));
						if(mysqli_num_rows($sql) > 0){
							while($data = mysqli_fetch_array($sql)){ ?>
								<tr>
                                    <td><?= $no++; ?></td>
									<td><?= $data['id_user']; ?></td>
									<td><?= $data['nama']; ?></td>
                                    <td><?= tgl_indo($data['tgl']); ?></td>
                                    <td><?= $data['s_in'] ?></td>
                                    <td><?= $data['ket'] ?></td>
									<td class="text-center">
										<a href="edit_absensi.php?id=<?= $data['id_absensi'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
										<a href="del_absensi.php?id=<?= $data['id_absensi'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							<?php
							}
						}
						else{
							echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
		<?php
			if(isset($_POST['pencarian']) == ''){ ?>
				<div style="float: left;">
					<?php
						$jml = mysqli_num_rows(mysqli_query($con, $query_jml));
						echo "Jumlah data : <b>$jml</b>";
					?>
				</div>
				<div style="float: right;">
					<ul class="pagination pagination-sm" style="margin: 0">
						<?php
							$jml_hal = ceil($jml / $batas);
							for ($i=1; $i <= $jml_hal; $i++){ 
								if($i != $hal){
									echo "<li><a href=\"?hal=$i\">$i</a></li>";
								}
								else{
									echo "<li class=\"active\"><a href=\"?hal=$i\">$i</a></li>";
								}
							}
						?>
					</ul>
				</div>
			<?php
			}
			else{
				echo "<div style=\"float:left\">";
				$jml = mysqli_num_rows(mysqli_query($con, $query_jml));
				echo "Data hasil pencarian : <b>$jml</b>";
				echo "</div>";
			}
		?>
	</div>

<?php include_once('../_footer.php'); ?>
