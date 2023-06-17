<h1>Laporan Alternatif</h1>
<table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Karyawan</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Posisi</th>
                    <th>No HP</th>
                </tr>
            </thead>
            <?php
            $q = esc_field($_GET['q']);

            $tahun = esc_field($_GET['tahun']);
            $rows = $db->get_results("SELECT * FROM tb_alternatif 
                WHERE kode_alternatif LIKE '%$q%'
                OR nama_alternatif LIKE '%$q%'
                ORDER BY kode_alternatif");
            $no=0;
            foreach($rows as $row):?>
                <tr>
                    <td><?=++$no ?></td>
                    <td><?=$row->kode_alternatif?></td>
                    <td><?=$row->nama_alternatif?></td>
                    <td><?=$row->tempat_lahir?>,<?=$row->tanggal_lahir?></td>
                    <td><?=$row->alamat?></td>
                    <td><?=$row->posisi?></td>
                    <td><?=$row->no_hp?></td>
                </tr>
            <?php endforeach;
            ?>
        </table>