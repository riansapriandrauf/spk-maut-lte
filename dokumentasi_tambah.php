<div class="page-header">
	<h1>Tambah Dokumentasi</h1>
</div>
<div class="row">
	<div class="col-sm-6">
        <?php 
        if ($_GET['status'] == 'gagal'){
            echo '<div class="alert alert-danger alert-dismissible">Maaf !! Gagal melakukan input Data</div>';
        }else if ($_GET['status'] == 'ekstensi'){
            echo '<div class="alert alert-danger alert-dismissible">Mohon Upload File Gambar Dengan Ekstensi (png / jpg / jpeg)</div>';
        }
        if(isset($_POST['t_doc'])){
            $ket = $_POST['ket'];
            $tgl = $_POST['tgl'];

            $nama_file          = $_FILES['foto']['name'];
            $pemisah_eks        = explode('.', $nama_file);
            $ekstensi_izin      = array('png','jpg','jpeg');
            $ekstensi           = strtolower(end($pemisah_eks));
            $file_tmp           = $_FILES['foto']['tmp_name'];
            $ukuran             = $_FILES['foto']['size'];
            $nama_baru          = date('Y-m-d-his').'.'.$ekstensi;
            $lokasi             = 'assets/img/dokumentasi/';
            
            if (in_array($ekstensi, $ekstensi_izin) == TRUE){
                $kirim = mysqli_query($konek, "INSERT INTO tb_doc (ket, tgl, foto) VALUES ('$ket', '$tgl', '$nama_baru')");
                if($kirim){
                    move_uploaded_file($file_tmp, $lokasi.$nama_baru);
                    echo '<script>window.location.href="index.php?m=dokumentasi"</script>';
                }else{
                    echo '<script>window.location.href="index.php?m=dokumentasi_tambah&status=gagal"</script>';
                }
            }else{
            }
        }
        ?>

		<form method="POST" action="index.php?m=dokumentasi_tambah" enctype="multipart/form-data">
			<div class="form-group">
				<label>Foto <span class="text-danger">*</span></label>
				<input class="form-control" type="file" name="foto" required>
			</div>
			<div class="form-group">
				<label>Tanggal<span class="text-danger">*</span></label>
				<input class="form-control" type="date" name="tgl" value="<?=date('Y-m-d')?>" readonly>
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<textarea class="form-control" name="ket"></textarea>
			</div>
			<button type="submit" name="t_doc" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger" href="?m=dokumentasi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</form>
	</div>
</div>