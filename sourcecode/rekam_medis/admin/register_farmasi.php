<?php
session_start();

include '../koneksi.php';


if(isset($_SESSION['password'])){ # kalau ada yang login
    $admin = mysqli_query($conn, "select * from user_admin where password='" . $_SESSION['password']. "'");
    $chek_admin = mysqli_num_rows($admin);
    if($chek_admin>0){ # Kalau yang login admin
        $sql = "insert into user_farmasi set 
        nama = '$_POST[nama]',
        username = '$_POST[username]',
        password = '$_POST[password]'";
    
        if (mysqli_query($conn, $sql)) {
        echo "Data berhasil terinput. ";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }else{
        echo "Hanya admin yang diperbolehkan";
    }
} else{
    echo "Login terlebih dahulu!";
}