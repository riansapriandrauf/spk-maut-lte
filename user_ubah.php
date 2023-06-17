<?php
$row = $db->get_row("SELECT * FROM  tb_divisi dv inner join tb_admin ad on ad.kode_divisi = dv.kode_divisi WHERE kode_user ='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Divisi</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=user_ubah&ID=<?=$row->kode_user?>">
            <div class="form-group">
                <label>Username<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="user" value="<?=$row->user?>"/>
            </div>
            <div class="form-group">
                <label>Password<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="pass" value="<?=$row->pass?>"/>
            </div>
            <div class="form-group">
                <label>Nama Divisi <span class="text-danger">*</span></label>
                <select class="form-control" name="divisi">
                    <?php
                    $dvs = $db->get_results("select * from tb_divisi"); 
                    foreach ($dvs as $k):?>
                        <option value="<?=$k->kode_divisi?>"><?=$k->nama_divisi?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label>Level<span class="text-danger">*</span></label>
                <select class="form-control" name="level">
                    <option>Admin</option>
                    <option>Operator</option>
                </select>
            </div>
            <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
            <a class="btn btn-danger" href="?m=user"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
        </form>
    </div>
</div>