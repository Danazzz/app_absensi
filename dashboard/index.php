<?php include_once('../_header.php'); ?>

    <div class="box">
        <div align="center" class="col-lg-12">
            <h1>PROFILE</h1>
            <p>Selamat Datang <mark><?=$_SESSION['user'];?></mark> di Website absensi KEPENG</p><br>
            <?php
            $user = $_SESSION['user'];
            $query = "SELECT * FROM tb_mahasiswa
                INNER JOIN tb_user ON tb_mahasiswa.id_user = tb_user.id_user
                WHERE tb_mahasiswa.username = '$user'
            ";
            $sql_biodata = mysqli_query($con, $query) or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql_biodata) 
            ?>
            <img src="..\_assets\uploads\<?= $data['gambar'] ?>" width='120' height='140'>
            <p>NIM: <?= $data['id_user'] ?> </p>
            <p>Nama: <?= $data['nama'] ?> </p>
            <?php
            if($data['jkel']=='L'){?>
                <p>Jenis Kelamin: Laki-laki</p>
            <?php } else { ?>
                <p>Jenis Kelamin: Perempuan</p>
            <?php
            } ?>
            <p>Alamat: <?= $data['alamat'] ?> </p>
            <p>No. Telp: <?= $data['no_telp'] ?> </p>
            <p>Instansi: <?= $data['instansi'] ?> </p>
            <a href="edit.php?id=<?= $data['id_user'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <br><br>
            <form action="proses.php "method="post" class="navbar-form">
                <div class="input-group">
                    <select name="ket" id="ket" class="form-control" required="">
                        <option value="">- Pilih -</option>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                    </select>
                </div>
                <input type="submit" name="absen" value="Absen" class="btn btn-success">
            </form>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>
