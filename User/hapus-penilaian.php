<?php


require_once "../config.php";

$id_alternatif = $_GET['id_alternatif'];

mysqli_query($koneksi, "DELETE FROM tabel_nilai WHERE id_alternatif='$id_alternatif'");


echo "<script>
    alert('Data Nilai Berhasil Di Hapus..');
    document.location.href='penilaian.php';
</script>";
return;


?>