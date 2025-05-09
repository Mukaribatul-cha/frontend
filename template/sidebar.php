<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Al Asror</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="ab-0">
                            <a class="nav-link" href="<?= $main_url ?>user/alternatif.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-network-wired"></i></i></div>
                                Data Alternatif
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/kriteria.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></i></div>
                                Data Kriteria
                            </a>
                          
                            <a class="nav-link" href="<?= $main_url ?>user/penilaian.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-marker"></i></div>
                                Data Penilaian
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/perhitungan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calculator"></i></div>
                                Data Perhitungan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/hasilakhir.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-lightbulb"></i></div>
                                Data Hasil Akhir
                            </a>
                            <hr class="ab-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></i></div>
                                User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-lock"></i></i></div>
                                Ganti Password
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION["ssUser"] ?>
                    </div>
                </nav>
            </div>