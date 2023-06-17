
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
