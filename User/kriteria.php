<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";

$title = "Data Kriteria - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Kriteria</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Kriteria</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Kriteria</span>
                    <a href="<?= $main_url ?>user/add-kriteria.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-square-plus"></i> Tambah Kriteria</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama kriteria</center></th>
                                <th scope="col"><center> Bobot</center></th>
                                <th scope="col"><center>Subkriteria</center></th>
                                <th scope="col"><center>Opsi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM  tabel_kriteria ORDER BY id_kriteria");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { ?>
                                <tr> 
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $a['nama_kriteria'] ?></td>
                                    <td><?= $a['bobot_kriteria'] ?></td>
                                    <td align="center">
                                        <a href="subkriteria.php?id_kriteria=<?= $a['id_kriteria'] ?>" class="btn btn-sm btn-info" title="Lihat Subkriteria"><i class="fa-brands fa-readme"></i></a>
                                    </td>
                                    <td align="center">
                                        <a href="edit-kriteria.php?id_kriteria=<?= $a['id_kriteria']?>" class="btn btn-sm btn-warning" title="Update kriteria"><i class="fa-solid fa-pen-nib"></i></a>
                                        <a href="hapus-kriteria.php?id_kriteria=<?= $a['id_kriteria'] ?>" class="btn btn-sm btn-danger" title="Delete kriteria" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"><i class="fa-solid fa-trash"></i></a>
                                        
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