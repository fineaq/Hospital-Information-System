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
        <li ><a href="history.php?id=<?php echo $id=$_GET['id'];?>">Histori Pemeriksaan</a></li>
        <li ><a href="jadwal_dokter.php?id=<?php echo $id=$_GET['id'];?>">Lihat Jadwal Dokter</a></li>

      
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



<div class="form-row">
    <div class="form-group col-md-12">
      
     
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Tanggal Pemeriksaan</label>
      <input type="date" class="form-control" name="tgl" id="nama" placeholder="Nama Lengkap">
    </div>
  </div>
  
  
 <!--  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Keluhan</label>
      <textarea class="form-control" name="keluhan"  id="keluhan" rows="3"></textarea>
    </div>
  </div> -->

 <!--  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Riwayat Penyakit</label>
      <textarea class="form-control" name="riwayat"  id="riwayat" rows="3"></textarea>
    </div>
  </div> -->
  
  
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
include '../koneksi.php';

if(isset($_POST['proses'])){

 $check = mysqli_query($conn, "select * from order_pemeriksaan where id_pasien = '$id'");
 $row = mysqli_fetch_array($check);
 $total = $row[0];
 if ($total==NULL) {
  mysqli_query($conn, "insert into order_pemeriksaan set id_pasien = '$id' ,tanggal_pemeriksaan = '$_POST[tgl]'");
  header("location: select_dokter.php?id=".$id=$_GET['id']);
 
  } else {
    header("location: gagal.php?id=".$id);
   
  
  }
  

 



}




?>