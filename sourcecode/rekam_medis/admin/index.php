<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>REKAM MEDIS</title>

    <link rel="stylesheet" type="text/css" href="../style.css">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
    
        <a class="navbar-brand" href="#"><img src="../img/logo-puskesmas.png" alt="logo">REKAM MEDIS</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
            </li>
          </ul>


        </div>
    </nav>

    <div class="row">
   
    <form action="register_dokter.php" method="post" class="col-md-6">
			<label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Nama .." required="required">
 
			<label>Spesialis</label>
			<input type="text" name="spesialis" class="form_login" placeholder="Spesialis .." required="required">
 
			<label>Hari Kerja</label>
			<input type="text" name="hari_kerja" class="form_login" placeholder="hari kerja .." required="required">
 
 
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
		
			<input type="submit" class="tombol_login" value="Register Dokter">
 
			<br/>
			<br/>
		
    </form>

    <form action="register_farmasi.php" method="post" class="col-md-6">
            <label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Nama .." required="required">
            
            <label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
 
		
			<input type="submit" class="tombol_login" value="Register Farmasi">
 
			<br/>
			<br/>

    </form>

    <form action="tambah_obat.php" method="post" class="col-md-6">
            <label>Nama</label>
			<input type="text" name="nama" class="form_login" placeholder="Nama .." required="required">
            
            <label>Harga</label>
			<input type="text" name="harga" class="form_login" placeholder="Harga .." required="required">
 
		
			<input type="submit" class="tombol_login" value="Tambah Obat">
 
			<br/>
			<br/>

    </form>

    </div>
</body>
</html>