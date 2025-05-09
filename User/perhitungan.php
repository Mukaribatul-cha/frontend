<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Data Perhitungan - Ponpes Al Asror";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Perhitungan</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Perhitungan</li>
                </ol>
                <div class="card">
                    <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Perhitungan</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Kriteria</center></th>
                                <th scope="col"><center> Bobot</center></th>
                                <th scope="col"><center>Normalisasi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = mysqli_query($koneksi,"SELECT * FROM  tabel_kriteria ORDER BY id_kriteria ");
                            $no=1;
                            while ($a=mysqli_fetch_array($data)) {

                                $dt=mysqli_query($koneksi,"SELECT  SUM(bobot_kriteria) as sum_bobot FROM tabel_kriteria");
                                $td =mysqli_fetch_array($dt);
                                $n_normalisasi = $a['bobot_kriteria']/$td['sum_bobot'];
                                
                                ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $a['nama_kriteria'] ?></td>
                                    <td class="text-center"><?= $a['bobot_kriteria'] ?></td>
                                    <td class="text-center"><?= $n_normalisasi ?>/<?= $td['sum_bobot']?> = <?= $n_normalisasi ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                        <br>

                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col"><center>Nama Alternatif</center></th>
                                    <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk = mysqli_fetch_array($dkriteria)) {
                                        echo "<th class='text-center'>$dk[nama_kriteria]</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = mysqli_query($koneksi,"SELECT * FROM  tabel_alternatif ORDER BY id_alternatif ");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { 
                                    $id = $a['id_alternatif'];
                                    $nama = $a['nama_alternatif'];
                                    
                                    $dnilai = mysqli_query($koneksi,"SELECT * FROM tabel_nilai WHERE id_alternatif='$id'");
                                    $dn = mysqli_fetch_array($dnilai);

                                    echo "<tr>";

                                    if (empty($dn['id_alternatif'])) {
                                        
                                    }else{
                                    
                                        echo "<td class='text-center'>".$no++."</td>";
                                        echo "<td class='text-center'>$nama</td>";

                                        $query = mysqli_query($koneksi,"SELECT a.nama_subkriteria as sub FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$id' ORDER BY b.id_kriteria");
                                        while ($dq=mysqli_fetch_array($query)) {
                                            echo "<td class='text-center'>$dq[sub]</td>";
                                            
                                        }
                                    } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>

                        <h4>Data Nilai Konversi Alternatif</h4>

                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                    <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk = mysqli_fetch_array($dkriteria)) {
                                        echo "<th class='text-center'>$dk[nama_kriteria]</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = mysqli_query($koneksi,"SELECT * FROM  tabel_alternatif ORDER BY id_alternatif ");
                            $no=1;
                            while ($a=mysqli_fetch_array($data)) { 
                                $id = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                
                                $dnilai = mysqli_query($koneksi,"SELECT * FROM tabel_nilai WHERE id_alternatif='$id'");
                                $dn = mysqli_fetch_array($dnilai);

                                echo "<tr>";

                                if (empty($dn['id_alternatif'])) {
                                    
                                }else{
                                
                                    echo "<td class='text-center'>".$no++."</td>";
                                    echo "<td class='text-center'>$nama</td>";

                                    $query = mysqli_query($koneksi,"SELECT a.nilai_subkriteria as sub FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$id' ORDER BY b.id_kriteria");
                                    while ($dq=mysqli_fetch_array($query)) {
                                        echo "<td class='text-center'>$dq[sub]</td>";
                                        
                                    }
                                } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tr>
                            <td colspan="2"><b>Nilai Max</b></b></td>
                            <?php
                                $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                while ($dk = mysqli_fetch_array($dkriteria)) {
                                    $idK = $dk['id_kriteria'];
                                    $query = mysqli_query($koneksi,"SELECT MAX(a.nilai_subkriteria) as max FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$idK'");
                                    $dq=mysqli_fetch_array($query);


                                    
                                    echo "<td class='text-center'><b>$dq[max]<b></td>";
                                }
                            ?>
                        </tr>

                        <tr>
                            <td colspan="2"><b>Nilai Min</b></b></td>
                            <?php
                                $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                while ($dk = mysqli_fetch_array($dkriteria)) {
                                    $idK = $dk['id_kriteria'];
                                    $query = mysqli_query($koneksi,"SELECT MIN(a.nilai_subkriteria) as min FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$idK'");
                                    $dq=mysqli_fetch_array($query);


                                    
                                    echo "<td class='text-center'><b>$dq[min]<b></td>";
                                }
                            ?>
                        </tr>
                        </table>

                        <br>
                        <h4>Data Nilai Utilitas </h4>

                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                    <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk = mysqli_fetch_array($dkriteria)) {
                                        echo "<th class='text-center'>$dk[nama_kriteria]</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tabel_alternatif");
                            $no=1;
                            while ($a=mysqli_fetch_array($data)) {
                                $id = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                $dnilai = mysqli_query($koneksi,"SELECT * FROM tabel_nilai WHERE id_alternatif='$id'");
                                $dn = mysqli_fetch_array($dnilai);

                                echo "<tr>";

                                if (empty($dn['id_alternatif'])){
                                                
                                }else{
                                
                                    echo "<td class='text-center'>".$no++."</td>";
                                    echo "<td class='text-center'>$nama</td>";

                                    $query = mysqli_query($koneksi,"SELECT a.nilai_subkriteria as sub, b.id_kriteria as id_kriteria FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$id' ORDER BY b.id_kriteria");
                                    while ($dq=mysqli_fetch_array($query)) {
                                        $n_sub = $dq['sub'];

                                        //Panggil Nilai Maxsimal
                                        $query1 = mysqli_query($koneksi,"SELECT MAX(a.nilai_subkriteria) as max FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$dq[id_kriteria]'");
                                        $dq1=mysqli_fetch_array($query1);
                                        $n_max = $dq1['max'];
                                
                                        //panggil nilai minimal
                                        $query2 = mysqli_query($koneksi,"SELECT MIN(a.nilai_subkriteria) as min FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$dq[id_kriteria]'");
                                        $dq2=mysqli_fetch_array($query2);
                                        $n_min = $dq2['min'];

                                        //untuk hitung nilai utility
                                        $n_utiliti = ($n_max != $n_min) 
                                        ? ((($n_sub - $n_min) / ($n_max - $n_min)) * 100) / 100 
                                        : 0;
                                    
            
                                        echo "<td class='text-center'> (($n_sub-$n_min) / ($n_max-$n_min)) x 100% <br> = $n_utiliti</td>";
                                    }
                                }       
                                 ?>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        
                        <h4>Data Nilai Normalisasi Bobot </h4>
                        <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                <?php
                                    $dkriteria = mysqli_query($koneksi,"SELECT * FROM tabel_kriteria ORDER BY id_kriteria");
                                    while ($dk = mysqli_fetch_array($dkriteria)) {
                                        echo "<th class='text-center'>$dk[nama_kriteria]</th>";
                                    }
                                ?>
                                    <th scope="col"><center>Nilai Akhir</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM tabel_alternatif");
                            $no=1;
                            while ($a=mysqli_fetch_array($data)) {
                                $n_akhir = 0.0;
                                $id = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                $dnilai = mysqli_query($koneksi,"SELECT * FROM tabel_nilai WHERE id_alternatif='$id'");
                                $dn = mysqli_fetch_array($dnilai);

                                echo "<tr>";

                                if (empty($dn['id_alternatif'])){

                                }else {
                                    echo "<td class='text-center'>".$no++."</td>";
                                    echo "<td class='text-center'>$nama</td>";

                                    $query = mysqli_query($koneksi,"SELECT a.nilai_subkriteria as sub, b.id_kriteria as id_kriteria FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_alternatif='$id' ORDER BY b.id_kriteria");
                                    while ($dq=mysqli_fetch_array($query)) {
                                        $n_sub = $dq['sub'];

                                        //Panggil Nilai Maxsimal
                                        $query1 = mysqli_query($koneksi,"SELECT MAX(a.nilai_subkriteria) as max FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$dq[id_kriteria]'");
                                        $dq1=mysqli_fetch_array($query1);
                                        $n_max = $dq1['max'];
                                
                                        //panggil nilai minimal
                                        $query2 = mysqli_query($koneksi,"SELECT MIN(a.nilai_subkriteria) as min FROM tabel_subkriteria a, tabel_nilai b WHERE a.id_subkriteria=b.id_subkriteria AND b.id_kriteria='$dq[id_kriteria]'");
                                        $dq2=mysqli_fetch_array($query2);
                                        $n_min = $dq2['min'];

                                        //untuk hitung nilai utility
                                        $n_utiliti = ($n_max != $n_min) 
                                        ? ((($n_sub - $n_min) / ($n_max - $n_min)) * 100) / 100 
                                        : 0;


                                        //panggil nilai Bobot
                                        $data1 = mysqli_query($koneksi,"SELECT * FROM  tabel_kriteria WHERE id_kriteria='$dq[id_kriteria]' ORDER BY id_kriteria ");
                                        ($a1=mysqli_fetch_array($data1));

                                            //sum Bobot Kriteria
                                            $dt=mysqli_query($koneksi,"SELECT  SUM(bobot_kriteria) as sum_bobot FROM tabel_kriteria");
                                            $td =mysqli_fetch_array($dt);
                                            $n_normalisasi = $a1['bobot_kriteria']/$td['sum_bobot'];

                                            

                                            //untuk Hitung Normalisasi dan Bobot

                                            $n_matriks_bobot = $n_utiliti*$n_normalisasi;
                                            $n_akhir += $n_matriks_bobot;
                                        
                                        echo "<td class='text-center'>$n_utiliti x $n_normalisasi = $n_matriks_bobot</td>";
                                    }
                                    echo "<td class='text-center'>$n_akhir</td>";

                                    mysqli_query($koneksi,"UPDATE tabel_alternatif set nilai_smart=$n_akhir WHERE id_alternatif='$id'");
                                }
                            ?>
                            </tr>
                            <?php } ?>
                        </table>
                        <br>

                        <h4>Perangkingan </h4>
                        <?php
                        //proses rangking
                        $rang = mysqli_query($koneksi,"SELECT * FROM tabel_alternatif ORDER BY nilai_smart DESC");
                        $rank = 1;
                        while ($rg= mysqli_fetch_array($rang)) {
                            mysqli_query($koneksi,"UPDATE tabel_alternatif set rangking='$rank' WHERE id_alternatif='$rg[id_alternatif]'");
                            $rank++;
                        } 

                    ?>
                    <table class="table table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col"><center>Nama Alternatif</center></th>
                                <th scope="col"><center> Nilai Smart</center></th>
                                <th scope="col"><center>Rangking</center></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $data = mysqli_query($koneksi,"SELECT * FROM  tabel_alternatif ORDER BY rangking ");
                                $no=1;
                                while ($a=mysqli_fetch_array($data)) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td class="text-center"><?php echo $a['nama_alternatif'] ?></td>
                                        <td class="text-center"><?php echo $a['nilai_smart'] ?></td>
                                        <td class="text-center"><?php echo $a['rangking'] ?></td>

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
