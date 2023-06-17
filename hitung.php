<div class="page-header">
    <h2>Perhitungan</h2>
</div>
<?php
$c = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE kode_crips NOT IN (SELECT kode_crips FROM tb_crips)");
if (!$ALTERNATIF || !$KRITERIA) :
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c) :
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else :
?>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Normalisasi Kriteria</strong></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($KRITERIA as $key => $value) : ?>
                        <tr>
                            <th><?= $key ?></th>
                            <td><?= $value['nama_kriteria'] ?></td>
                            <td><?= $value['bobot'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Data Alternatif</strong></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <?php
                        $analisa1 = get_data_2();
                        foreach (current($analisa1) as $key => $value) : ?>
                            <th><?= $KRITERIA[$key]['nama_kriteria'] ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($analisa1 as $key => $value) : ?>
                        <tr>
                            <th><?= $key ?></th>
                            <th><?= $ALTERNATIF[$key] ?></th>
                            <?php foreach ($value as $k => $v) : ?>
                                <td><?= $v ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <?php
                        $analisa = get_data();
                        $minmax = get_minmax($analisa);
                        foreach (current($analisa) as $key => $value) : ?>
                            <th><?= $KRITERIA[$key]['nama_kriteria'] ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($analisa as $key => $value) : ?>
                        <tr>
                            <th><?= $key ?></th>
                            <th><?= $ALTERNATIF[$key] ?></th>
                            <?php foreach ($value as $k => $v) : ?>
                                <td><?= $v ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                <tfoot>
                    <tr>
                        <td colspan="2">Max</td>
                        <?php foreach ($minmax['max'] as $key => $val) : ?>
                            <td><?= $val ?></td>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <td colspan="2">Min</td>
                        <?php foreach ($minmax['min'] as $key => $val) : ?>
                            <td><?= $val ?></td>
                        <?php endforeach ?>
                    </tr>
                </tfoot>
                </tbody>
            </table>

        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Nilai Utility</strong></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <?php
                        $utility = nilai_utility($analisa);
                        foreach (current($utility) as $key => $value) : ?>
                            <th><?= $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($utility as $key => $value) : ?>
                        <tr>
                            <th><?= $key ?></th>
                            <?php foreach ($value as $k => $v) : ?>
                                <td><?= $v ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Terbobot</strong></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <?php
                        $terbobot = terbobot($utility);
                        foreach (current($terbobot) as $key => $value) : ?>
                            <th><?= $key ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($terbobot as $key => $value) : ?>
                        <tr>
                            <th><?= $key ?></th>
                            <?php foreach ($value as $k => $v) : ?>
                                <td><?= $v ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading"><strong>Hasil Akhir dan Rangking</strong></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <?php $hasil_akhir = hasil_akhir($terbobot);
                        $rank = get_rank($hasil_akhir); ?>
                        <th>Hasil Optimasi</th>
                        <th>Rangking</th>
                    </tr>
                </thead>
                <?php
                $data = "";
                $nilai = "";
                $kuota = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM tb_kuota"));
                foreach ($hasil_akhir as $key => $value) : ?>
                    <tr style="<?php if ($rank[$key] <= $kuota['kuota']){echo 'color : green;'; }else{echo 'color : red;';} ?>">
                    <!-- <tr <?= ($rank[$key] == 1) ? 'style="color:red;"' : ''; ?>> -->
                        <th><?= $ALTERNATIF[$key] ?></th>
                        <td><?= $value ?></td>
                        <td><?= $rank[$key] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
<?php endif ?>