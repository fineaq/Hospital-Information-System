<!DOCTYPE html>
<html lang="en">
<head>
  <title>Puskesmapp - Apoteker</title>
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
        <li ><a href="bayar.php?id=<?php echo $id=$_GET['id'];?>">Pembayaran</a></li>

      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href='../logout.php'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="container text-center">
       
    <h1>Puskesmapp</h1>
    
      
                        <h3>Selamat datang Apoteker </h1>

                        <?php
        

          ?>
  </div>
</div>

<div class="container">

<h1 class="text-center" >Resep Obat</h1>
<br><br>
<!-- <form action="obat.php?id=<?php echo $id=$_GET['id'];?>" method="post" enctype="multipart/form-data" class=""> -->
<form action='' name='proses' method='post'>
<div class="row">
  <div class="col-md-3">

  </div>
    <div class="col-md-6">
    <p><b>Nama Pasien:</b></p>
    <select class="form-control" name='nama' required>
                  <option selected disabled value="">Nama Pasien</option>
                    <?php
                    include '../koneksi.php';
                     $brg=mysqli_query($conn, "select * from rekam_medis_header where status != '1'");
                     while($b=mysqli_fetch_array($brg)){
                       ?>
                    <option value="<?php echo $b['nama_pasien']; ?>"><?php echo $b['nama_pasien']; ?></option>

                       <?php } ?>
                  </select>
    </div>
    <div class="col-md-3">

  </div>
  </div><br><br>
  <div class="text-center">
  <input type="submit" class="btn btn-primary" value="SUBMIT" name="proses">
  </div>
    
</form>


<br><br>

<footer class="container-fluid text-center">
  <p>© 2022 Puskesmapp</p>
</footer>

</body>
</html>
<?php

$id = $_GET['id'];


if(isset($_POST['proses'])){
 
  mysqli_query($conn, "insert into pembayaran set nama_pasien = '$_POST[nama]'");
  mysqli_query($conn, "UPDATE rekam_medis_header set status = '1' where nama_pasien = '$_POST[nama]'");
  $id_pembayaran=mysqli_query($conn, "select id from pembayaran where nama_pasien = '$_POST[nama]'");
  while($d=mysqli_fetch_array($id_pembayaran)){
    $id_pembayaran = $d['id'];
    header("location: obat.php?id=".$id_pembayaran);
  }
  
  }











?>