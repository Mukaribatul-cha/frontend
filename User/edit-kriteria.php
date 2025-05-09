<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Update Kriteria - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";



$data = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria WHERE id_kriteria='".$_GET['id_kriteria']."'");
$a=mysqli_fetch_array($data);

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Kriteria</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../user/kriteria.php">Data Kriteria</a></li>
                <li class="breadcrumb-item active">Update Kriteria</li>
            </ol>
            
            <form action="proses-kriteria.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_kriteria" value="<?= $a['id_kriteria']; ?>">
                <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Kriteria</span>
                    <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" class="form-control" id="id_kriteria" value="<?= $a['nama_kriteria'] ?>">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="bobot_kriteria" class="form-label">Bobot Kriteria</label>
                                <input type="number" name="bobot_kriteria" class="form-control" value="<?= $a['bobot_kriteria']?>">
                            </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
                </div>

            </form>
        </div>
    </main>

<?php

    require_once "../template/footer.php";

?>