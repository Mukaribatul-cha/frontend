<?php


require_once "../config.php";

$id_alternatif = $_GET['id_alternatif'];

mysqli_query($koneksi, "DELETE FROM tabel_alternatif WHERE id_alternatif ='$id_alternatif'");


echo "<script>
    alert('Data Alternatif Berhasil Di Hapus..');
    document.location.href='alternatif.php';
</script>";
return;


?>