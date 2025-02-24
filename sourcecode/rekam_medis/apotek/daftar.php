<!DOCTYPE html>
<html>
<head>
	<title>Puskesmapp - Apoteker</title>
</head>
<body>
<center><h1>Anda Berhasil Melakukan Transaksi</h1><center>
<br>
<?php
include '../koneksi.php';
$det=mysqli_query($conn, "SELECT id FROM resep_obat ORDER BY ID DESC LIMIT 1");
              while($d=mysqli_fetch_array($det)){
                ?>
               
                <center><a href="invoice.php?id=<?php echo ($id=$d['id']+1);?>">Cetak Invocie  </a><center>
                

                <?php
  }

  ?>

    <br>
<center><a href="index.php?id=<?php echo $id=$_GET['id'];?>">Kembali</a><center>
<body>

<?php
include '../koneksi.php';
$url = $_SERVER['HTTP_REFERER'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

if(isset($_POST['proses'])){
    $nama = htmlspecialchars($_POST['nama']);
    $dokter = htmlspecialchars($_POST['dokter']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $obat = htmlspecialchars($_POST['obat']);
    $total = htmlspecialchars($_POST['total']);

    $insert = mysqli_query($conn, "INSERT INTO resep_obat VALUES (
     NULL,
     '$nama',
     '$dokter',
     '$tanggal',
     '$obat',
     '$total'
       )");

    if($insert){
      
    }else{
      echo "<div class='col-md-10 col-sm-12 col-xs-12'>";
      echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
      echo "<p><center>Data Gagal Masuk</center></p>";
      echo   "</div>";
      echo "</div>";

    }




     }

?>