<?php include_once('../_header.php'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
            <p>Selamat Datang <mark><?=$_SESSION['user'];?></mark> di Website absensi KEPENG</p>

            
            <?php
            $user = $_SESSION['user'];
            $query = "SELECT * FROM tb_mahasiswa
                INNER JOIN tb_user ON tb_mahasiswa.id_user = tb_user.id_user
                WHERE tb_mahasiswa.username = '$user'
            ";
            $sql_biodata = mysqli_query($con, $query) or die(mysqli_error($con));
            while($data = mysqli_fetch_array($sql_biodata)){ ?>
                <p>NIM: <?= $data['id_user'] ?> </p><br>
                <p>Nama: <?= $data['nama'] ?> </p><br>
                <p>Jenis Kelamin: <?= $data['jkel'] ?> </p><br>
                <p>Alamat: <?= $data['nama'] ?> </p><br>
                <p>No_telp: <?= $data['no_telp'] ?> </p><br>
                <p>Instansi: <?= $data['instansi'] ?> </p><br>
            <?php
			} ?>


            <form action="proses.php" method="post">
                <div class="input-group">
                    <label for="identitas">Nomor Identitas</label>
                    <input type="number" name="identitas" id="identitas" class="form-control" required="">
                </div>
                <input type="submit" name="absen" value="Absen" class="btn btn-success">
            </form>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>
