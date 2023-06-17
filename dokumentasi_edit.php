<div class="page-header">
    <h1>Edit Dokumentasi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php
        // ID GET URL
        $id_doc = $_GET['doc'];
        // SEARCH DATA WITH ID 
        $cari_doc = mysqli_query($konek, "SELECT * FROM tb_doc WHERE id_doc='$id_doc'") or die(mysqli_error($konek));
        $dt = mysqli_fetch_array($cari_doc);

        //STATUS KONDISIONAL
        if ($_GET['status'] == 'gagal') {
            echo '<div class="alert alert-danger">Maaf !! Gagal melakukan input Data</div>';
        } else if ($_GET['status'] == 'ekstensi') {
            echo '<div class="alert alert-danger">Mohon Upload File Gambar Dengan Ekstensi (png / jpg / jpeg)</div>';
        }

        // UPDATE DOKUMENTS 
        if (isset($_POST['u_doc'])) {
            $ket = $_POST['ket'];
            $id_doc = $id_doc;
            $cek = mysqli_query($konek, "SELECT * FROM tb_doc WHERE id_doc='$id_doc'") or die(mysqli_error($konek));
            if (empty($_FILES['foto']['name'])) {
                $update = mysqli_query($konek, "UPDATE tb_doc SET ket='$ket' WHERE id_doc='$id_doc'");
                if ($update) {
                    echo '<script>window.location.href="index.php?m=dokumentasi"</script>';
                } else {
                    echo '<script>window.location.href="index.php?m=dokumentasi_tambah&doc='.$id_doc.'&status=gagal"</script>';
                }
            } else {
                $nama_file          = $_FILES['foto']['name'];
                $pemisah_eks        = explode('.', $nama_file);
                $ekstensi_izin      = array('png', 'jpg', 'jpeg');
                $ekstensi           = strtolower(end($pemisah_eks));
                $file_tmp           = $_FILES['foto']['tmp_name'];
                $ukuran             = $_FILES['foto']['size'];
                $nama_baru          = date('Y-m-d-his') . '.' . $ekstensi;
                $lokasi             = 'assets/img/dokumentasi/';

                if (in_array($ekstensi, $ekstensi_izin) == TRUE) {
                    
                    $update = mysqli_query($konek, "UPDATE tb_doc SET ket='$ket', foto='$nama_baru' WHERE id_doc='$id_doc'");

                    $dt32 = mysqli_fetch_array($cek);
                    if ($update) {
                        unlink($lokasi.$dt32['foto']);
                        move_uploaded_file($file_tmp, $lokasi . $nama_baru);
                        echo '<script>window.location.href="index.php?m=dokumentasi"</script>';
                    } else {
                        echo '<script>window.location.href="index.php?m=dokumentasi_tambah&status=gagal"</script>';
                    }
                } else {
                    echo '<script>window.location.href="index.php?m=dokumentasi_tambah&status=ekstensi"</script>';
                }
            }
        }
        ?>

        <form method="POST" action="index.php?m=dokumentasi_edit&doc=<?=$id_doc?>" enctype="multipart/form-data">
            <div class="form-group">
                <label>Foto <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="foto">
                <input class="form-control" type="hidden" name="id_doc" value="<?=$id_doc?>">
            </div>
            <div class="form-group">
                <label>Tanggal<span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tgl" value="<?= $dt['tgl'] ?>" readonly>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="ket"><?= $dt['ket'] ?></textarea>
            </div>
            <button type="submit" name="u_doc" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=dokumentasi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>