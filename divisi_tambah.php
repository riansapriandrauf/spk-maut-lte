<div class="page-header">
    <h1>Tambah Divisi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php  if($_POST) include'aksi.php'?>
        <form method="post" action="?m=divisi_tambah">
            <div class="form-group">
                <label>Kode Divisi<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" value="<?=$_POST[kode]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Divisi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$_POST[nama]?>"/>
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=divisi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>