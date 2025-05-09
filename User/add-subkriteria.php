<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Tambah Subkriteria - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['id_kriteria'])) {
    $id_kriteria = $_GET['id_kriteria'];
} else {
    $id_kriteria = ''; // Beri nilai default untuk menghindari error
}

$id_kriteria = isset($_GET['id_kriteria']) ? $_GET['id_kriteria'] : '';

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Subkriteria</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../user/subkriteria.php?id_kriteria=<?= $id_kriteria ?>">Data Subkriteria</a></li>
                <li class="breadcrumb-item active">Tambah Subkriteria</li>
            </ol>
            
            <form action="proses-subkriteria.php" method="POST">
            <input type="hidden" id="id_kriteria" name="id_kriteria" value="<?= $id_kriteria ?>">
                <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Subkriteria</span>
                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nama_subkriteria" class="form-label">Nama Subkriteria</label>
                                <input type="text" name="nama_subkriteria" class="form-control" id="nama_subkriteria" required>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nilai_subkriteria" class="form-label">Nilai Subkriteria</label>
                                <input type="number" name="nilai_subkriteria" class="form-control" id="nilai_subkriteria" required>
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