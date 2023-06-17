<div class="page-header">
	<h1>Tambah Akun</h1>
</div>
<div class="row">
	<div class="col-sm-6">
        <?php 
        if ($_GET['status'] == 'gagal'){
            echo '<div class="alert alert-danger alert-dismissible">Maaf !! Gagal melakukan input Data</div>';
        }else if ($_GET['status'] == 'ekstensi'){
            echo '<div class="alert alert-danger alert-dismissible">Mohon Upload File Gambar Dengan Ekstensi (png / jpg / jpeg)</div>';
        }
        if(isset($_POST['t_user'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $level = $_POST['level'];

            $kirim = mysqli_query($konek, "INSERT INTO tb_admin (user, pass, nama_lengkap, level) values ('$user', '$pass', '$nama_lengkap', $level)");
            if($kirim){
                echo '<script>window.location.href="index.php?m=donatur"</script>';
            }else{
                echo '<script>window.location.href="index.php?m=donatur_tambah&status=gagal"</script>';
            }
        }
        ?>

		<form method="POST" action="index.php?m=donatur_tambah" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Lengkap <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nama_lengkap" required>
			</div>

            <div class="form-group">
				<label>Hak Akses <span class="text-danger">*</span></label>
				<select name="level" class="form-control" required> 
                    <option value="">--- Pilih Hak Akses ---</option>
                    <option value="2">Donatur</option>
                    <option value="3">Masyarakat</option>
                </select>
			</div>

			<div class="form-group">
				<label>Username<span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="user" required>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" name="pass" required>
			</div>
			<button type="submit" name="t_user" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger" href="?m=donatur"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</form>
	</div>
</div>