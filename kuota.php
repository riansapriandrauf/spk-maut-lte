<div class="page-header">
    <h1>Kuota</h1>
</div>
<div class="row">
    <div class="col-sm-5">
        
        <?php
        // STATUS KONDISI 
        if($_GET['status']=='berhasil'){
            echo '<div class="alert alert-success">Berhasil Mengubah Kuota</div>';
        }else if ($_GET['status'] == 'gagal'){
            echo '<div class="alert alert-danger">Maaf gagal melakukan perubahan Kuota</div>';
        }

        // PROGRAM PENCARIAN JUMLAH KUOTA SAAT INI
        $jm_dt = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM tb_alternatif"));
        // PROGRAM PENCARIAN DAN UPDATE BATAS KUOTA 
        $cb_kuota = mysqli_query($konek, "SELECT * FROM tb_kuota");
        $dk = mysqli_fetch_array($cb_kuota);

        if(isset($_POST['change-kuota'])){
            $kuota = $_POST['kuota'];
            $update1 = mysqli_query($konek, "UPDATE tb_kuota SET kuota='$kuota'");
            if($update1){
                echo '<script>window.location.href="index.php?m=kuota&status=berhasil"</script>';
            }else{
                echo '<script>window.location.href="index.php?m=kuota&status=gagal"</script>';
            }
        }
        ?>
        <form method="post" action="?m=kuota">
            <div class="form-group">
                <label>Jumlah Pendaftar<span class="text-danger">*</span></label>
                <input class="form-control" type="text" readonly value="<?=$jm_dt?>" />
            </div>
            <div class="form-group">
                <label>Kuota <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="kuota" value="<?= $dk['kuota'] ?>" required>
            </div>
            <div class="form-group">
                <label>Konfirmasi Perubahan<span class="text-danger">*</span></label>
                <input type="checkbox" required>
            </div>
            <button type="submit" name="change-kuota" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        </form>
    </div>
</div>