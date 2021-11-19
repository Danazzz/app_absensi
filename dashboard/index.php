<?php include_once('../_header.php'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
            <p>Selamat Datang <mark><?=$_SESSION['user'];?></mark> sebagai pengunjung di Website absensi KEPENG</p>
            <form action="..absensi/data.php" method="post">
                <div class="input-group">
                <form action="proses.php" method="post">
                    <div class="form-group">
                        <label for="identitas">Nomor Identitas</label>
                        <input type="number" name="identitas" id="identitas" class="form-control" required="">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" name="add" value="Absen" class="btn btn-success">
                    </div>
                </form>
        </div>
    </div>

<?php include_once('../_footer.php'); ?>
