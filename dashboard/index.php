<?php include_once('../_header.php'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1>PROFILE</h1>
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
                <?php
                if($data['jkel']=='L'){?>
                    <p>Jenis Kelamin: Laki-laki</p><br>
                <?php } else { ?>
                    <p>Jenis Kelamin: Perempuan</p><br>
                <?php
                } ?>
                <p>Alamat: <?= $data['alamat'] ?> </p><br>
                <p>No_telp: <?= $data['no_telp'] ?> </p><br>
                <p>Instansi: <?= $data['instansi'] ?> </p><br>
                <div class="pull-right">
                    <a href="edit.php?id=<?= $data['id_user'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                </div>
            <?php
			} ?>
            <form action="proses.php "method="post">
                <input type="submit" name="absen" value="Absen" class="btn btn-success">
            </form>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>
