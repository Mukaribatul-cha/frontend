<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Data Penilaian - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penilaian</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data penilaian</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data penilaian</span>
                    <a href="<?= $main_url ?>user/add-penilaian.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-square-plus"></i> Tambah penilaian</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk = mysqli_fetch_array($dkriteria)) {
                                        echo "<th class='text-center'>$dk[nama_kriteria]</th>";
                                    }
                                ?>
                                <th scope="col"><center>Opsi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = mysqli_query($koneksi,"SELECT * FROM  tabel_alternatif ORDER BY id_alternatif ");
                            $no=1;
                            while ($a=mysqli_fetch_array($data)) {
                                $id = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                
                                $dnilai = mysqli_query($koneksi,"SELECT * FROM tabel_nilai WHERE id_alternatif='$id'");
                                $dn = mysqli_fetch_array($dnilai);

                                echo "<tr>";

                                if (empty($dn['id_alternatif'])) {
                                    
                                }else{
                                

                                    echo "<td class='text-center'>".$no++."</td>";
                                    echo "<td class='text-center'>$nama</td>";
                                    
 
                                    $query = mysqli_query($koneksi,"SELECT a.nama_subkriteria as sub FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$id' ORDER BY b.id_kriteria");
                                    while ($dq=mysqli_fetch_array($query)) {
                                        echo "<td class='text-center'>$dq[sub]</td>";
                                        
                                    }
                                
                                ?>

                                    <td align="center">
                                        <a href="edit-penilaian.php?id_alternatif=<?= $a['id_alternatif'] ?>" class="btn btn-sm btn-warning" title="Update penilaian"><i class="fa-solid fa-pen-nib"></i></a>
                                        <a href="hapus-penilaian.php?id_alternatif=<?= $a['id_alternatif'] ?>" class="btn btn-sm btn-danger" title="Delete penilaian" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </main>
<?php

    require_once "../template/footer.php";

?>