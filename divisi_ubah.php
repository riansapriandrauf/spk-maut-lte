<?php
$row = $db->get_row("SELECT * FROM  tb_divisi WHERE kode_divisi ='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Divisi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=divisi_ubah&ID=<?=$row->kode_divisi  ?>">
            <div class="form-group">
                <label>Kode Divisi<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly value="<?=$row->kode_divisi?>"/>
            </div>
            <div class="form-group">
                <label>Nama Divisi <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_divisi?>"/>
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=divisi"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>