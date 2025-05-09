<?php

require_once "../config.php";
    if (isset($_POST['simpan'])) { 
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        mysqli_query($koneksi, "INSERT INTO tabel_kriteria(nama_kriteria,bobot_kriteria) VALUES ('$nama_kriteria','$bobot_kriteria')");

echo "<script>
        alert('Data kriteria Berhasil Disimpan');
        document.location.href = 'kriteria.php';
    </script>";
    return;

    } else if (isset($_POST['update'])) {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        mysqli_query($koneksi, "UPDATE tabel_kriteria set nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria' WHERE id_kriteria='$id_kriteria'");

echo "<script>
        alert('Data Kriteria Berhasil Diupdate');
        document.location.href = 'kriteria.php';
    </script>";
    return;


    }
      
