<?php

require_once "../config.php";
    if (isset($_POST['simpan'])) { 
        $nama_alternatif = $_POST['nama_alternatif'];
        mysqli_query($koneksi, "INSERT INTO tabel_alternatif(nama_alternatif) VALUES ('$nama_alternatif')");

echo "<script>
        alert('Data Alternatif Berhasil Disimpan');
        document.location.href = 'alternatif.php';
    </script>";
    return;

    } else if (isset($_POST['update'])) {
        $id_alternatif = $_POST['id_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];
        mysqli_query($koneksi, "UPDATE tabel_alternatif set nama_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'");

echo "<script>
        alert('Data Alternatif Berhasil Diupdate');
        document.location.href = 'alternatif.php';
    </script>";
    return;


    }
      





?>