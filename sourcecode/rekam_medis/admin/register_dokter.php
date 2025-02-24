<?php
session_start();


include '../koneksi.php';


if(isset($_SESSION['password'])){ # kalau ada yang login
    $admin = mysqli_query($conn, "select * from user_admin where password='" . $_SESSION['password']. "'");
    $chek_admin = mysqli_num_rows($admin);
    if($chek_admin>0){ # Kalau yang login admin

$sql = "insert into user_dokter set 
username = '$_POST[username]',
password = '$_POST[password]'";

if (mysqli_query($conn, $sql)) {
echo "Data user_dokter berhasil terinput.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$last_id = $conn->insert_id;

$sql2 = "insert into dokter set 
nama = '$_POST[nama]',
spesialis = '$_POST[spesialis]',
hari_kerja = '$_POST[hari_kerja]'";

if (mysqli_query($conn, $sql2)) {
    echo "Data dokter berhasil terinput.";
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }

}else{
    echo "Hanya admin yang diperbolehkan";
}
} else{
echo "Login terlebih dahulu!";
}