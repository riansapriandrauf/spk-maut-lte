<?php
$id_user = $_GET['user'];
$cari = mysqli_query($konek, "SELECT * FROM tb_admin WHERE id_user='$id_user'");
if (mysqli_num_rows($cari) > 0) {
    $hapus = mysqli_query($konek, "DELETE FROM tb_admin WHERE id_user = '$id_user'");
    if ($hapus) {
        echo '<script>window.location.href="?m=donatur"</script>';
    } else {
        echo '<script>alert("Gagal Menghapus data");window.location.href="?m=donatur"</script>';
    }
} else {
    echo '<script>window.location.href="?m=donatur"</script>';
}
