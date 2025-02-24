<?php
$username   = ($_POST['username']);
$pass       = ($_POST['password']);

include '../koneksi.php';

$admin = mysqli_query($conn, "select * from user_admin where username='$username' and password='$pass'");
$chek_admin = mysqli_num_rows($admin);

if($chek_admin>0)
{
  	session_start();
    $row = mysqli_fetch_array($admin);
    $_SESSION['password'] = $row['password'];
    header("location: ../admin/index.php");
}
else{
    header("location: login.php?pesan=gagal");
}
?>