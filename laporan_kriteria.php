<div class="page-header">
    <h1>Laporan Kriteria</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="laporan_kriteria" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
                <div class="form-group">
                    <a class="btn btn-default" target="_blank" href="cetak.php?m=laporan_kriteria&q=<?=$_GET['q']?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kriteria</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <?php
                $q = esc_field($_GET['q']);
                $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY kode_kriteria");
                $no=0;
                foreach($rows as $row):?>
                    <tr>
                        <td><?=++$no ?></td>
                        <td><?=$row->kode_kriteria?></td>
                        <td><?=$row->nama_kriteria?></td>
                        <td><?=$row->bobot?></td>
                    </tr>
                <?php endforeach;
                ?>
            </table>
        </div>
    </div>