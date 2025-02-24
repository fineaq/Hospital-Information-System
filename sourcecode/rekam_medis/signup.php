<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<head>

    <title>Halaman Sign Up</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="halaman">
<div class="container"> 
    
    <center>
        
    <br>
    <br>

        <div class="card mt-5 " style="width: 90%;">
            <div class="card-header halaman"><img src="img/logo-puskesmas.png" alt="logo" ><h4>Sign up</h4></div>
                <div class="card-body halaman">
                    <form action="sign_up_cek.php" method="post" class="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10 mb-4">
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                            </div>
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10 mb-4">
                            <input type="text" class="form-control" name="nik" placeholder="1371040XXXXXX">
                            </div>
                            <label class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10 mb-4">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10 mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10 mb-4">
                            <input type="date" class="form-control" name="tgl_lahir" placeholder="umur"></div>
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10 mb-4">
                            <select class="form-control"   name="jenis_kelamin" placeholder="Jenis Kelamin">
                            <option value="laki-laki" >Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                         </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Golongan Darah</label>
                            <div class="col-sm-10 mb-4">
                            <input type="text" class="form-control" name="gol" placeholder="A+"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10 mb-4">
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Telp</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_telp" placeholder="No. Telp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. BPJS</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="bpjs" placeholder="No. BPJS">
                            </div>
                        </div>
                        
                        <br>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Register" name="proses" style="background-color: grey;color:black;">
                        </div>
                    </form>
                    
                </div>
     
        </div>
    </center>
</div> 
</body>
</html>

