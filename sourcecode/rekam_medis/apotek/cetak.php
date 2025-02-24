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
        <li ><a href="history.php?id=<?php echo $id=$_GET['id'];?>">Histori Resep Obat</a></li>

      
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

<h1 class="text-center" >Resep Obat</h1>
<br><br>
<!-- <form action="daftar.php?id=" method="post" enctype="multipart/form-data" class=""> -->
<form action='' name='proses' method='post'>

  <div class="text-center">
  <input type="submit" class="btn btn-success" value="Cetak Invoice" name="proses">
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
    header("location: invoice.php?id=".$id);

}

  
   
?>
