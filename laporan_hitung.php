<div class="page-header">
    <h1>Laporan Hitung</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="laporan_kriteria" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <a class="btn btn-default" target="_blank" href="cetak.php?m=laporan_hitung&q=<?=$_GET['q']?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <?php 
        $analisa = get_data(); 
        $minmax = get_minmax($analisa);   
        $utility = nilai_utility($analisa); 
        $terbobot = terbobot($utility); ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php $hasil_akhir = hasil_akhir($terbobot); $rank = get_rank($hasil_akhir);?>
                    <th>Hasil Optimasi</th>
                    <th>Rangking</th>
                </tr>     
            </thead>
            <?php 
            $data ="";
            $nilai ="";
            foreach($hasil_akhir as $key => $value):?>
                <tr <?=($rank[$key]==1)?'style="color:red;"':'';?>>
                    <th><?=$ALTERNATIF[$key]?></th>
                    <td><?=$value?></td>
                    <td><?=$rank[$key]?></td>
                </tr>
            <?php endforeach;?>
        </table> 
    </div>
</div>