<?php

require_once "../config.php";


    if (isset ($_POST['simpan'])) { 
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];
        mysqli_query($koneksi, "INSERT INTO tabel_subkriteria(id_kriteria,nama_subkriteria,nilai_subkriteria) VALUES ('$id_kriteria','$nama_subkriteria','$nilai_subkriteria')");

echo "<script>
        alert('Data Subkriteria Berhasil Disimpan');
        document.location.href = 'subkriteria.php?id_kriteria=$id_kriteria';
    </script>"; 
    return;

    } else if (isset($_POST['update'])) {
        $id_subkriteria = $_POST['id_subkriteria'];
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];
        mysqli_query($koneksi, "UPDATE tabel_subkriteria set nama_subkriteria='$nama_subkriteria', nilai_subkriteria='$nilai_subkriteria' WHERE id_subkriteria='$id_subkriteria'");

echo "<script>
        alert('Data Subkriteria Berhasil Diupdate');
        document.location.href = 'subkriteria.php?id_kriteria=$id_kriteria';
    </script>";
    return;


    }

    
      