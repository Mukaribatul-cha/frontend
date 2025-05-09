<?php


require_once "../config.php";

$id_kriteria = $_GET['id_kriteria'];

mysqli_query($koneksi, "DELETE FROM tabel_kriteria WHERE id_kriteria ='$id_kriteria'");


echo "<script>
    alert('Data Kiteria Berhasil Di Hapus..');
    document.location.href='kriteria.php';
</script>";
return;


?>