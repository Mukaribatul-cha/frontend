<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Data Hasil Akhir - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Hasil Akhir</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Hasil Akhir</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Hasil Akhir</span>
                    <a href="<?= $main_url ?>user/cetak.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-print"></i> Cetak</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col"><center>No</center></th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                <th scope="col"><center>Nilai Smart</center></th>
                                <th scope="col"><center>Rangking</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = mysqli_query($koneksi,"SELECT * FROM  tabel_alternatif ORDER BY rangking ");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td><?= $a['nama_alternatif'] ?></td>
                                        <td class="text-center"><?= $a['nilai_smart'] ?></td>
                                        <td class="text-center"><?= $a['rangking'] ?></td>

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