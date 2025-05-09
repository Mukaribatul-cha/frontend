<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";

$title = "Tambah Alternatif - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$data = mysqli_query($koneksi,"SELECT * FROM tabel_alternatif ORDER BY id_alternatif");
$a = mysqli_fetch_array($data); 

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Alternatif</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../user/alternatif.php">Data Alternatif</a></li>
                <li class="breadcrumb-item active">Tambah Alternatif</li>
            </ol>
            
            <form action="proses-alternatif.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Alternatif</span>
                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-3">
                                <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                                <input type="text" name="nama_alternatif" class="form-control" id="alternatif" required>
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