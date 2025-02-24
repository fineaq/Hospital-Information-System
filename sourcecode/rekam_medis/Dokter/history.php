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
        <li><a href="index.php?id=<?php echo $id=$_GET['id'];?>">Home</a></li>
        <li class="active"><a href="history.php?id=<?php echo $id=$_GET['id'];?>">Daftar Rekam Medis</a></li>
   
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

<?php 

include '../koneksi.php';
  
    $id=$_GET['id'];
    $det=mysqli_query($conn, "select nama from dokter where id = '$id'");
  while($d=mysqli_fetch_array($det)){
    $nama_dokter = $d['nama'];
    $daftar=mysqli_query($conn, "select * from rekam_medis_header where nama_dokter = '$nama_dokter' ");
  }
    ?>



<div class="container">
<h3 class="text-center" >Daftar Rekam Medis</h3><br><br>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Tangal Pemeriksaan</th>
      <th scope="col">Keluhan</th>
      <th scope="col">Diagnosa</th>
      <th scope="col">Resep</th>
      
    </tr>
  </thead>
  <tbody>

    <?php 

            session_start();
 

            include '../koneksi.php';
            foreach ($daftar as $row) {
                echo "<tr>";
                echo "<td>".$row['nama_pasien']."</td>";
                echo "<td>".$row['tanggal_pemeriksaan']."</td>";
                echo "<td>".$row['keluhan']."</td>";
                echo "<td>".$row['diagnosa']."</td>";
                echo "<td>".$row['resep']."</td>";
               
                echo "</tr>";
                
            };
            ?>
    
  </tbody>
</table>

</div>

<br><br>

<footer class="container-fluid text-center">
  <p>© 2022 Puskesmapp</p>
</footer>

</body>
</html>
