<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Update Subkriteria - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";



$data = mysqli_query($koneksi,"SELECT * FROM tabel_subkriteria WHERE id_subkriteria='".$_GET['id_subkriteria']."'");
$a=mysqli_fetch_array($data);

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Subkriteria</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../user/subkriteria.php">Data Subkriteria</a></li>
                <li class="breadcrumb-item active">Update Subkriteria</li>
            </ol>
            
            <form action="proses-subkriteria.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_subkriteria" value="<?= $a['id_subkriteria'] ?>">
            <input type="hidden" name="id_kriteria" value="<?= $_GET['id_kriteria']?>">
                <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Subkriteria</span>
                    <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nama_subkriteria" class="form-label">Nama Subkriteria</label>
                                <input type="text" name="nama_subkriteria" class="form-control" id="id_subkriteria" value="<?= $a['nama_subkriteria'] ?>">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nilai_subkriteria" class="form-label">Nilai Subkriteria</label>
                                <input type="number" name="nilai_subkriteria" class="form-control" value="<?= $a['nilai_subkriteria']?>">
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