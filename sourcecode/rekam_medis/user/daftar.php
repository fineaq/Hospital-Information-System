<?php
include '../koneksi.php';
$url = $_SERVER['HTTP_REFERER'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$user = mysqli_query($conn, "select * from pendaftaran where nama='$_POST[nama]' ");
$chek_user = mysqli_num_rows($user);
if(isset($_POST['proses'])){
    if($chek_user>0)
{
    header("location: gagal.php?id=".$id=$_GET['id']);

  	
}
else{
    mysqli_query($conn, "insert into pendaftaran set
    
    nama = '$_POST[nama]',
    id_user = '$params[id]',
    nik = '$_POST[nik]',
    jenis_kelamin = '$_POST[jenis_kelamin]',
    alamat = '$_POST[alamat]',
    telepon = '$_POST[telepon]',
    tgl = '$_POST[tgl]',
    keluhan = '$_POST[keluhan]',
    status = '0'");
    $row = mysqli_fetch_array($user);
    header("location: berhasil.php?id=".$id=$_GET['id']);

  
}
   
}
?>