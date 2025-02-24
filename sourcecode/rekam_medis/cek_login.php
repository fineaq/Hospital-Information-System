<?php
$username   = ($_POST['username']);
$pass       = ($_POST['password']);

include 'koneksi.php';

$admin = mysqli_query($conn, "select * from user_admin where username='$username' and password='$pass'");
$user_pasien = mysqli_query($conn, "select * from user_pasien where username='$username' and password='$pass'");
$user_dokter = mysqli_query($conn, "select * from user_dokter where username='$username' and password='$pass'");
$user_farmasi = mysqli_query($conn, "select * from user_farmasi where username='$username' and password='$pass'");

$chek_admin = mysqli_num_rows($admin);
$chek_user_pasien = mysqli_num_rows($user_pasien);
$chek_user_dokter = mysqli_num_rows($user_dokter);
$chek_user_farmasi = mysqli_num_rows($user_farmasi);

$user_id_pasien = mysqli_query($conn, "select id_pasien from user_pasien where username='$username' and password='$pass'");
$user_id_dokter = mysqli_query($conn, "select id_dokter from user_dokter where username='$username' and password='$pass'");
$user_id_farmasi = mysqli_query($conn, "select id from user_farmasi where username='$username' and password='$pass'");

if($chek_admin>0)
{
  
  	session_start();
    $row = mysqli_fetch_array($admin);
    $_SESSION['password'] = $row['password'];
    header("location: ../rekam_medis/admin/index.php");
}
elseif($chek_user_pasien){
    session_start();
    $row = mysqli_fetch_array($user_pasien);
    $_SESSION['password'] = $row['password'];
    header("location: ../rekam_medis/user/index.php?id=".$user_id_pasien->fetch_array()[0]);
}
elseif($chek_user_dokter){
    session_start();
    $row = mysqli_fetch_array($user_dokter);
    $_SESSION['password'] = $row['password'];
    header("location: ../rekam_medis/Dokter/index.php?id=".$user_id_dokter->fetch_array()[0]);
}
elseif($chek_user_farmasi){
    session_start();
    $row = mysqli_fetch_array($user_farmasi);
    $_SESSION['password'] = $row['password'];
    header("location: ../rekam_medis/apotek/index.php?id=".$user_id_farmasi->fetch_array()[0]);
}


else{
    header("location: login.php?pesan=gagal");
}
?>