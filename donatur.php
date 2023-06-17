<div class="page-header">
    <h2>Donatur & Masyarakat</h2>
</div>
<div style="margin-bottom: 1vh;">
    <a href="index.php?m=donatur_tambah" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Data Donatur & Masyarakat</strong></div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                $cari_doc = mysqli_query($konek, "SELECT * FROM tb_admin WHERE level>='2' order by id_user DESC") or die(mysqli_error($konek));
                while ($dt = mysqli_fetch_array($cari_doc)) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $dt['nama_lengkap'] ?></td>
                        <td>
                            <?php 
                            if($dt['level']==2){
                                echo 'Donatur';
                            }else if ($dt['level']==3){
                                echo 'Masyarakat';
                            }
                            ?>
                        </td>
                        <td><?= $dt['user'] ?></td>
                        <td><?= $dt['pass'] ?></td>
                        <?php if($_SESSION['level']==1){ ?>
                            <td>
                                <a href="?m=donatur_edit&user=<?=$dt['id_user']?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                <a href="?m=donatur_hapus&user=<?=$dt['id_user']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php 
                $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>