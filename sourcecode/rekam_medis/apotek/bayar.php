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
    <?php
      include '../koneksi.php';
      $id=$_GET['id'];
 $det=mysqli_query($conn, "select nama from user_farmasi where id = '$id'");
                    while($d=mysqli_fetch_array($det)){
                        ?>
                        <h3>Selamat datang <?php echo $d['nama'];?> </h1>

                        <?php
          }

          ?>
  </div>
</div>

<div class="container">

<h1 class="text-center" >Bayar Obat</h1>
<br><br>
<!-- <form action="daftar.php?id=" method="post" enctype="multipart/form-data" class=""> -->
<form action='' name='proses' method='post'>
<div class="row">
  <div class="col-md-3">

  </div>
    <div class="col-md-6">
    <p><b>Metode Bayar:</b></p>
    <select class="form-control" name='nama' >
                  <option selected disabled value="">Metode Bayar</option>
                   <option value="Cash">Cash</option>
                   <option value="Debit">Debit</option>
                   <option value="Qris">Qris</option>
                  </select>
    </div>
    <div class="col-md-3">

  </div>
  </div>
  <br>
  <div class="row">
  <div class="col-md-3">

  </div>

    <div class="col-md-6">
    <p><b>Signature:</b></p>
    <input type="text" name="signature"  class="form-control" placeholder="1670182529-1998701364" >
    </div>
    <div class="col-md-3">

  </div>
  </div>
  <br><br>
  <div class="text-center">
  <input type="submit" class="btn btn-primary" value="Bayar" name="proses">
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
  $signature = $_POST['signature'];
  $status=mysqli_query($conn, "select * from pembayaran where signature = '$signature'");
  while($d=mysqli_fetch_array($status)){
    $status_pembayaran = $d['status_pembayaran'];
    if ($status_pembayaran == '1') {
      header("location: gagal.php?id=".$id);
    } else {
      mysqli_query($conn, "DELETE FROM resep where id_pembayaran = '$id'");
      $date =  date('y-m-d h:i:s');
      $metode = $_POST['nama'];
      $signature = $_POST['signature'];
      $test =  mysqli_query($conn, "UPDATE pembayaran set status_pembayaran = '1', waktu_pembayaran = '$date' , metode_pembayaran = '$metode' where signature = '$signature'");
      if ($test) {
        
        header("location: berhasil.php?id=".$id);
      } else {
        header("location: gagal.php?id=".$id);
      }
    }
  
  }
  

  

 
  




}

  
   
?>
<?php


