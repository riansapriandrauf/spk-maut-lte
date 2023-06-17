<div class="page-header">
    <h1>User</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="user" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" href="?m=user_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
                </div>

            </form>
        </div>
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Divisi</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);
            if($_SESSION['level']=='Super Admin'){
                $rows = $db->get_results("SELECT * FROM tb_divisi dv inner join tb_admin ts on ts.kode_divisi = dv.kode_divisi WHERE nama_divisi LIKE '%$q%' OR user LIKE '%$q%' ORDER BY kode_admin");
            }else{
                $rows = $db->get_results("SELECT * FROM tb_divisi dv inner join tb_admin ts on ts.kode_divisi = dv.kode_divisi WHERE dv.kode_divisi='$_SESSION[divisi]' AND (nama_divisi LIKE '%$q%' OR user LIKE '%$q%' ) ORDER BY kode_admin");
            }
            $no=0;
            foreach($rows as $row):?>
                <tr>
                    <td><?=++$no ?></td>
                    <td><?=$row->user?></td>
                    <td><?=$row->nama_divisi?></td>
                    <td><?=$row->level?></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=user_ubah&ID=<?=$row->kode_admin?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=user_hapus&ID=<?=$row->kode_admin?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>