<link rel="stylesheet" href="assets/image-view/css/style2.css">
<!-- <link rel="stylesheet" href="assets/image-view/css/demo.css" /> -->

<div class="page-header">
    <h2>Dokumentasi</h2>
</div>
<div style="margin-bottom: 1vh;">
    <?php
    if ($_SESSION['level'] == 1) { ?>
        <a href="index.php?m=dokumentasi_tambah" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</a>
    <?php }
    ?>
</div>
<div class="panel panel-primary">
    <div class="panel-heading"><strong>Data Dokumentasi Kegiatan</strong></div>
    <div class="panel-body table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Lihat</th>
                    <?php if ($_SESSION['level'] == 1) { ?>
                        <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $cari_doc = mysqli_query($konek, "SELECT * FROM tb_doc order by id_doc DESC") or die(mysqli_error($konek));
                while ($dt = mysqli_fetch_array($cari_doc)) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $dt['ket'] ?></td>
                        <td><?= $dt['tgl'] ?></td>
                        <td><img id="myImg<?=$no?>" src="assets/img/dokumentasi/<?=$dt['foto']?>" alt="Trolltunga, Norway" style="width: 10vh;"/></td>
                        <?php if ($_SESSION['level'] == 1) { ?>
                            <td>
                                <a href="?m=dokumentasi_edit&doc=<?= $dt['id_doc'] ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                <a href="?m=dokumentasi_hapus&doc=<?= $dt['id_doc'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        <?php } ?>
                    </tr>
                    <div id="myModal<?=$no?>" class="modal">
                        <img class="modal-content" id="img01<?=$no?>" />
                    </div>
                    <script>
                        // Get the modal
                        var modal = document.getElementById('myModal<?=$no?>');

                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                        var img = document.getElementById('myImg<?=$no?>');
                        var modalImg = document.getElementById("img01<?=$no?>");
                        var captionText = document.getElementById("Caption<?=$no?>");
                        img.onclick = function() {
                            modal.style.display = "block";
                            modalImg.src = this.src;
                            modalImg.alt = this.alt;
                            captionText.innerHTML = this.alt;
                        }


                        // When the user clicks on <span> (x), close the modal
                        modal.onclick = function() {
                            img01.className += " out";
                            setTimeout(function() {
                                modal.style.display = "none";
                                img01.className = "modal-content";
                            }, 400);

                        }
                    </script>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div id="myModal" class="modal">
    <img class="modal-content" id="img01">
</div>