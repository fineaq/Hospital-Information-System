<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Dokter</title>
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
        <li class="active"><a href="history.php?id=<?php echo $id=$_GET['id'];?>">Histori Resep Obat</a></li>
   
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
  

    $daftar = $conn->query ("select * from rekammedis");

    ?>



<div class="container">
<h3 class="text-center" >Histori Resep Obat</h3><br><br>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th width=50 scope="col">Nama Pasien</th>
      <th width=50 scope="col">Nama Dokter</th>
      <th width=30 scope="col">Tangal Berobat</th>
      <th width=100 scope="col">Resep Dokter</th>
      
    </tr>
  </thead>
  <tbody>

    <?php 

            session_start();
 

            include '../koneksi.php';
            foreach ($daftar as $row) {
                echo "<tr>";
                echo "<td>".$row['nama_pasien']."</td>";
                echo "<td>".$row['nama_tenaga']."</td>";
                echo "<td>".$row['tanggal']."</td>";
                echo "<td>".$row['obat']."</td>";
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
