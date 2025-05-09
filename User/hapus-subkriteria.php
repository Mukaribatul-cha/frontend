<?php


require_once "../config.php";

$id_subkriteria = $_GET['id_subkriteria'];

mysqli_query($koneksi, "DELETE FROM tabel_subkriteria WHERE id_subkriteria ='$id_subkriteria'");


echo "<script>
    alert('Data Subkiteria Berhasil Di Hapus..');
    document.location.href='subkriteria.php';
</script>";
return;


?>