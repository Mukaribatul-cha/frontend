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
            <h1 class="mt-4">Tambah Penilaian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../user/penilaian.php">Data Penilaian</a></li>
                <li class="breadcrumb-item active">Tambah Penilaian</li>
            </ol>
            
            <form action="proses-penilaian.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Penilaian</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3">
                                    <label for="nama_penilaian" class="form-label">Nama Alternatif</label>
                                    <select class="form-control" name="id_alternatif" required>
                                        <?php
                                            $detalternatif = mysqli_query($koneksi,"SELECT * FROM tabel_alternatif WHERE id_alternatif='".$_GET['id_alternatif']."'");
                                            $deta= mysqli_fetch_array($detalternatif);

                                            ?>
                                            <option selected value="<?php echo $deta['id_alternatif']  ?>" ><?php echo $deta['nama_alternatif']?></option>
                                            <?php 
                                            $dalternatif = mysqli_query($koneksi,"SELECT * FROM tabel_alternatif ORDER BY id_alternatif");
                                            while ($da=mysqli_fetch_array($dalternatif)) {
                                                echo "<option value='$da[id_alternatif]'>$da[nama_alternatif]</option>";
                                            }
                                            ?>
                                    </select>
                                </div>
                                    <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk=mysqli_fetch_array($dkriteria)) {
                                        $idK= $dk['id_kriteria'];
                                        $labelK = $dk['nama_kriteria'];

                                        $dnilai = mysqli_query($koneksi, "SELECT * FROM tabel_nilai WHERE id_kriteria='$idK' AND id_alternatif='".$_GET['id_alternatif']."'");
                                        $dn = mysqli_fetch_array($dnilai);
                                        $sub = $dn['id_subkriteria'];

                                        echo "<div class='form-group'>
                                        <label>".$labelK."</label>";

                                        echo "<select class='form-control' name='penilaian[$idK]' required>";
                                        $dsubkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_subkriteria WHERE id_kriteria='$idK' ORDER BY nilai_subkriteria DESC");

                                        while ($ds=mysqli_fetch_array($dsubkriteria)) {

                                            if ($ds['id_subkriteria']==$sub) {
                                                echo "<option selected value='$ds[id_subkriteria]'>".$ds['nama_subkriteria']." - ".$ds['nilai_subkriteria']."</option>";
                                            
                                            }else{
                                                echo "<option value='$ds[id_subkriteria]'>".$ds['nama_subkriteria']." - ".$ds['nilai_subkriteria']."</option>";
                                            }
                 
                                        }

                                        echo "</select></div>";
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


<?php

    require_once "../template/footer.php";

?>