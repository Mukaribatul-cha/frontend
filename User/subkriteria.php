<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";

$title = "Data Subkriteria - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['id_kriteria'])) {
    $id_kriteria = $_GET['id_kriteria'];
} else {
    $id_kriteria = ''; // Beri nilai default untuk menghindari error
}


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Subkriteria</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item "><a href="kriteria.php"> Data Kriteria </a></li>
                    <li class="breadcrumb-item active">Data subkriteria</li>
                </ol>

                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Subkriteria</span>
                    <a href="<?= $main_url ?>user/add-subkriteria.php?id_kriteria=<?= $id_kriteria ?>" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-square-plus"></i> Tambah subkriteria</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Subkriteria</center></th>
                                <th scope="col"><center> Nilai Subkriteria</center></th>
                                <th scope="col"><center>Opsi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = mysqli_query($koneksi,"SELECT * FROM  tabel_subkriteria WHERE id_kriteria='$id_kriteria'ORDER BY id_subkriteria ");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { ?>
                                <tr> 
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $a['nama_subkriteria'] ?></td>
                                    <td><?= $a['nilai_subkriteria'] ?></td>
                                    <td align="center">
                                        <a href="edit-subkriteria.php?id_kriteria=<?= $a['id_kriteria']?>&id_subkriteria=<?= $a['id_subkriteria'] ?>" class="btn btn-sm btn-warning" title="Update subkriteria"><i class="fa-solid fa-pen-nib"></i></a>
                                        <a href="hapus-subkriteria.php?id_kriteria=<?= $a['id_kriteria']?>&id_subkriteria=<?= $a['id_subkriteria'] ?>" class="btn btn-sm btn-danger" title="Delete subkriteria" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"><i class="fa-solid fa-trash"></i></a>
                                    </td>
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