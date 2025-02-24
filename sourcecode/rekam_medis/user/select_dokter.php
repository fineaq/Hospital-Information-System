<!DOCTYPE html>
<html lang="en">
<head>
  <title>Puskesmapp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
     /*  background-color: green; */
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Puskesmapp</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
        <li class="active"><a href="index.php?id=<?php echo $id=$_GET['id'];?>">Home</a></li>


      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='../logout.php'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Selamat Datang Di Web</h1>      
    <h2>Puskesmapp</h2>
  </div>
</div>

<div class="container">
<h1 class="text-center" >Form Pendaftaran</h1>
<form action='' name='proses' method='post'>

<input hidden value="<?php echo $id=$_GET['id'];?>" name='id' type="text">

<?php 

include '../koneksi.php';

$id = $_GET['id'];
$get_id=mysqli_query($conn, "select * from order_pemeriksaan where id_pasien = '$id'");
while($c=mysqli_fetch_array($get_id)){
  $hari = $c['tanggal_pemeriksaan'];
  $timestamp = strtotime($hari);
  $day = date('D', $timestamp);
  $dokter = $conn->query ("select * from dokter where hari_kerja like '%' '$day' '%'");
    
}


    

    ?>

<div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Pilih Dokter</label>
      <select class="form-control" name="dokter" id="">
      <?php 

session_start();


include '../koneksi.php';
foreach ($dokter as $row) {

    echo ('<option>').$row['nama']."</option>";
    
};
?>
      
        <option value=""></option>

      </select>
    </div>
  </div>
  
  <!-- <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Tanggal Pemeriksaan</label>
      <input type="date" class="form-control" name="tgl" id="nama" placeholder="Nama Lengkap">
    </div>
  </div> -->
  
  
 <!--  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Keluhan</label>
      <textarea class="form-control" name="keluhan"  id="keluhan" rows="3"></textarea>
    </div>
  </div> -->

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Riwayat Penyakit</label>
      <textarea class="form-control" name="riwayat"  id="riwayat" rows="3"></textarea>
    </div>
  </div>
  
  
  <div class="text-center">
  <input type="submit" class="btn btn-primary" value="SUBMIT" name="proses">
  </div>
</form>
</div>

<br><br>

<footer class="container-fluid text-center">
  <p>© 2022 Puskesmapp</p>
</footer>

</body>
</html>
<?php

$id = $_GET['id'];


if(isset($_POST['proses'])){

    

mysqli_query($conn, "UPDATE order_pemeriksaan set nama_dokter = '$_POST[dokter]', riwayat_penyakit = '$_POST[riwayat]'  where id_pasien = '$id'");

    header("location: berhasil.php?id=".$id=$_GET['id']);




}




?>