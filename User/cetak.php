<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Data Alternatif - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center">Laporan Hasil Akhir</h1>
            <hr>
            <br>
            <h3 class="text-center"><span>Sistem Pendukung Keputusan <br>Pada Pemilihan Lurah Pondok Putri Al Asror Menggunakan Metode Smart</span></h3>
            <br>
            <br>
            <br>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-drak">
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
                </main>
<?php

    require_once "../template/footer.php";

?>
                <script>
                    window.print();
                </script>