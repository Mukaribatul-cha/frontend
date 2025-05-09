<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

//jika tombol simpan ditekan 
if (isset($_POST['simpan'])) {
    // ambil value elemen yang diposting 
    $username       = trim(htmlspecialchars($_POST['username']));
    $nama           = trim(htmlspecialchars($_POST['nama']));
    $email          = trim(htmlspecialchars($_POST['email']));
    $password       = 1234;
    $pass           = password_hash($password, PASSWORD_DEFAULT);
    
    // cek username
    $cekUsername = mysqli_query($koneksi,"SELECT * FROM tabel_user WHERE username = '$username'");
    if (mysqli_num_rows($cekUsername) > 0) {
        header("location:add-user.php?msg=cancel");
        return;
    }

    mysqli_query($koneksi,"INSERT INTO tabel_user VALUES(null,'$username','$pass','$nama','$email')");

    header("location:add-user.php?msg=added");
    return;

}


?>