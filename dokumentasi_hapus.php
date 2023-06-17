<?php 
$id_doc = $_GET['doc'];
$lokasi = 'assets/img/dokumentasi/';
$cari = mysqli_query($konek, "SELECT * FROM tb_doc WHERE id_doc='$id_doc'");
if(mysqli_num_rows($cari)>0){
    $dt32 = mysqli_fetch_array($cari);
    $del = unlink($lokasi.$dt32['foto']);
    if($del){
        $hapus = mysqli_query($konek, "DELETE FROM tb_doc WHERE id_doc = '$id_doc'");
        if($hapus){
            echo '<script>window.location.href="?m=dokumentasi"</script>';
        }else{
            echo '<script>alert("Gagal Menghapus data");window.location.href="?m=dokumentasi"</script>';
        }
    }else{
        echo '<script>alert("Gagal Menghapus Gambar");window.location.href="?m=dokumentasi"</script>';
    }
}else{
    echo '<script>window.location.href="?m=dokumentasi"</script>';
}
