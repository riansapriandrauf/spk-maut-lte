<div class="page-header">
    <h1>Edit Donatur</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php
        // ID GET URL
        $id_user = $_GET['user'];
        // SEARCH DATA WITH ID 
        $cari_user = mysqli_query($konek, "SELECT * FROM tb_admin WHERE id_user='$id_user'") or die(mysqli_error($konek));
        $dt = mysqli_fetch_array($cari_user);

        //STATUS KONDISIONAL
        if ($_GET['status'] == 'gagal') {
            echo '<div class="alert alert-danger">Maaf !! Gagal melakukan input Data</div>';
        } else if ($_GET['status'] == 'ekstensi') {
            echo '<div class="alert alert-danger">Mohon Upload File Gambar Dengan Ekstensi (png / jpg / jpeg)</div>';
        }

        // UPDATE DOKUMENTS 
        if (isset($_POST['u_user'])) {

            $id_user        = $_POST['id_user'];
            $nama_lengkap   = $_POST['nama_lengkap'];
            $level          = $_POST['level'];
            $user           = $_POST['user'];
            $pass           = $_POST['pass'];

            $update = mysqli_query($konek, "UPDATE tb_admin SET nama_lengkap='$nama_lengkap', user='$user', pass='$pass', level='$level'  WHERE id_user='$id_user'");
            if ($update) {
                echo '<script>window.location.href="index.php?m=donatur"</script>';
            } else {
                echo '<script>window.location.href="index.php?m=donatur_tambah&user=' . $id_user . '&status=gagal"</script>';
            }
        }
        ?>

        <form method="POST" action="index.php?m=donatur_edit&user=<?= $id_user ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_lengkap" value="<?=$dt['nama_lengkap']?>" required>
            </div>
            <div class="form-group">
				<label>Hak Akses <span class="text-danger">*</span></label>
				<select name="level" class="form-control" required> 
                    <option value="">--- Pilih Hak Akses ---</option>
                    <option <?php if($dt['level']==2){echo 'selected';}?> value="2">Donatur</option>
                    <option <?php if($dt['level']==3){echo 'selected';}?> value="3">Masyarakat</option>
                </select>
			</div>
            <div class="form-group">
                <label>Username<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=$dt['user']?>" required>
                <input type="hidden" name="id_user" value="<?=$id_user?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" name="pass" value="<?=$dt['pass']?>" required>
            </div>
            <button type="submit" name="u_user" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=donatur"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>