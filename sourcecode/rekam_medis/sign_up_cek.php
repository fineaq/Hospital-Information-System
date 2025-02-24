<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
<center><h1>Akun Berhasil Terdaftar!</h1><center>
<br>
<center><a href="logout.php">LOGIN</a><center>
<body>

<?php
include 'koneksi.php';

if(isset($_POST['proses'])){
    $sql =  mysqli_query($conn, "insert into pasien set
    
    nama = '$_POST[nama]',
    nik = '$_POST[nik]',
    jenis_kelamin = '$_POST[jenis_kelamin]',
    tanggal_lahir = '$_POST[tgl_lahir]',
    alamat = '$_POST[alamat]',
    golongan_darah = '$_POST[gol]',
    nomor_telepon = '$_POST[no_telp]',
    no_bpjs = '$_POST[bpjs]'");

    
        $last_id = $conn->insert_id;
        mysqli_query($conn, "insert into user_pasien set
    
        id_pasien = '$last_id',
        username = '$_POST[username]',
        password = '$_POST[password]'");
      

   
}
?>