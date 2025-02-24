<!DOCTYPE html>
<html lang="en">
<head>
  <title>Puskesmapp - Dokter</title>
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
        <li ><a href="history.php?id=<?php echo $id=$_GET['id'];?>">Daftar Rekam Medis</a></li>

      
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
    <?php
      include '../koneksi.php';
      $id=$_GET['id'];
 $det=mysqli_query($conn, "select nama from dokter where id = '$id'");
                    while($d=mysqli_fetch_array($det)){
                        ?>
                        <h3>Selamat datang <?php echo $d['nama'];?> </h1>

                        <?php
          }

          ?>
  </div>
</div>

<div class="container">

<h1 class="text-center" >Rekam Medis Pasien</h1>
<br><br>
<form action='' name='proses' method='post'>
<div class="row">
    <div class="col-md-6">
    <p><b>Nama Pasien:</b></p>
    <select class="form-control" name='pasien' required>
                  <option selected disabled value="">Nama Pasien</option>
                    <?php
                      include '../koneksi.php';
                    $id=$_GET['id'];
                    $det=mysqli_query($conn, "select nama from dokter where id = '$id'");
                    while($d=mysqli_fetch_array($det)){
                    $nama_dokter = $d['nama'];
                    $brg=mysqli_query($conn, "select * from order_pemeriksaan where nama_dokter = '$nama_dokter' ");
                        while($b=mysqli_fetch_array($brg)){
                        $id_pasien = $b['id_pasien'];
                        $nama_pasien=mysqli_query($conn, "select * from pasien where id = '$id_pasien' ");
                            while($f=mysqli_fetch_array($nama_pasien)){
                              ?>
                          <option value="<?php echo $f['nama']; ?>"><?php echo $f['nama']; ?></option>

                              <?php }  
                            }}
                      ?> 
                  </select>
    </div>
    <div class="col-md-6">
    <p><b>Tanggal Berobat:</b></p>
            <input class="form-control form-control-sm" type="date"  aria-label=".form-control-sm example" name='tanggal' required>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
    <p><b>Keluhan:</b></p>
<textarea name='keluhan' placeholder="Keluhan Pasien...." class="form-control" required=""></textarea>
    </div>
    <div class="col-md-4">
    <p><b>Diagnosa:</b></p>
<textarea name='diagnosa' placeholder="Diagnosa Pasien...." class="form-control" required=""></textarea>
    </div>
    <div class="col-md-4">
    <p><b>Resep :</b></p>
    <textarea required name='obat' class="form-control"  id="comment"></textarea>
 
    </div>
</div>
<br><br>
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
  
  $det=mysqli_query($conn, "select nama from dokter where id = '$id'");
  while($d=mysqli_fetch_array($det)){
    $nama_dokter = $d['nama'];
    $brg=mysqli_query($conn, "select * from order_pemeriksaan where nama_dokter = '$nama_dokter' ");
        while($b=mysqli_fetch_array($brg)){
        $id_order = $b['id'];
                    mysqli_query($conn, "insert into rekam_medis_header set

                    id = 'NULL',
                    id_pemeriksaan = '$id_order',
                    nama_dokter = '$nama_dokter',
                    nama_pasien = '$_POST[pasien]',
                    tanggal_pemeriksaan = '$_POST[tanggal]',
                    keluhan = '$_POST[keluhan]',
                    diagnosa = '$_POST[diagnosa]',    
                    resep = '$_POST[obat]'");
                   
            }}


    $nama_pasien = $_POST['pasien'];
    $pasien=mysqli_query($conn, "select * from pasien where nama = '$nama_pasien'");
    while($c=mysqli_fetch_array($pasien)){
      $id_pasien = $c['id'];
      $brg=mysqli_query($conn, "DELETE FROM order_pemeriksaan where id_pasien = '$id_pasien' ");
      header("location: berhasil.php?id=".$id);
    }






}




?>