<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Data Alternatif - Metode Smart";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Alternatif</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Alternatif</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Alternatif</span>
                    <a href="<?= $main_url ?>user/add-alternatif.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-square-plus"></i> Tambah Alternatif</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                <th scope="col"><center>Opsi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = mysqli_query($koneksi, "SELECT * FROM  tabel_alternatif ORDER BY id_alternatif");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { ?>
                                <tr> 
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $a['nama_alternatif'] ?></td>
                                    <td align="center">
                                        <a href="edit-alternatif.php?id_alternatif=<?= $a['id_alternatif']?>" class="btn btn-sm btn-warning" title="Update Alternatif"><i class="fa-solid fa-pen-nib"></i></a>
                                        <a href="hapus-alternatif.php?id_alternatif=<?= $a['id_alternatif'] ?>" class="btn btn-sm btn-danger" title="Delete Alternatif" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini ?')"><i class="fa-solid fa-trash"></i></a>
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