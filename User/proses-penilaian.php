<?php

require_once "../config.php";

if (isset($_POST['simpan'])) { 
    $id_alternatif = $_POST['id_alternatif'];
    $dnilai = mysqli_query($koneksi, "SELECT * FROM tabel_nilai WHERE id_alternatif='$id_alternatif'");
    $dn = mysqli_num_rows($dnilai);

    if ($dn > 0) {
        echo "<script>
            alert('Penilaian untuk alternatif ini sudah ada!');
            document.location.href = 'penilaian.php';
        </script>";
    return;

    }else{
        $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
        while ($dk=mysqli_fetch_array($dkriteria)) {
            $idK=$dk['id_kriteria'];
            $idS=$_POST['penilaian'][$idK];


            $query = "INSERT INTO tabel_nilai(id_alternatif,id_kriteria,id_subkriteria)VALUES('$id_alternatif','$idK','$idS')";
            $result = mysqli_query($koneksi,$query);
        }

        echo "<script>
            alert('Data Penilaian Berhasil Disimpan');
            document.location.href = 'penilaian.php';
        </script>";
    return;
    } 
} else if (isset($_POST['update'])) {
    $id_alternatif = $_POST['id_alternatif'];
    mysqli_query($koneksi,"DELETE FROM tabel_nilai WHERE id_alternatif='$id_alternatif'");

        $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
        while ($dk=mysqli_fetch_array($dkriteria)) {
            $idK=$dk['id_kriteria'];
            $idS=$_POST['penilaian'][$idK];

            $query = "INSERT INTO tabel_nilai(id_alternatif,id_kriteria,id_subkriteria)VALUES('$id_alternatif','$idK','$idS')";
            $result = mysqli_query($koneksi,$query);

        }

echo "<script>
        alert('Data Penilaian Berhasil Diupdate');
        document.location.href = 'penilaian.php';
    </script>";
    return;
    
}



?>


