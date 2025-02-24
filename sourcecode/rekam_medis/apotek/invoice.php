<html>

	<head>
	<title>Puskesmapp - Apoteker</title>
		<style type="text/css">
		body {		
			font-family: Verdana;
		}
		
		div.invoice {
		border:1px solid #ccc;
		padding:10px;
		height:740pt;
		width:570pt;
		}

		div.company-address {
			border:1px solid #ccc;
			float:left;
			width:200pt;
		}
		
		div.invoice-details {
			border:1px solid #ccc;
			float:right;
			width:200pt;
		}
		
		div.customer-address {
			border:1px solid #ccc;
			float:right;
			margin-bottom:50px;
			margin-top:100px;
			width:200pt;
		}
		
		div.clear-fix {
			clear:both;
			float:none;
		}
		
		table {
			width:100%;
		}
		
		th {
			text-align: left;
		}
		
		td {
		}
		
		.text-left {
			text-align:left;
		}
		
		.text-center {
			text-align:center;
		}
		
		.text-right {
			text-align:right;
		}
		@media print {
  #printPageButton {
    display: none;
  }
}
		</style>
	</head>

	<body>
	
        <button id="printPageButton" onclick="window.print()">Cetak</button>
	<div class="invoice">
		<div class="company-address">
			Puskesmas 
			<br />
			Kelompok 10
			<br />
			
		</div>
	
		<div class="invoice-details">
			<p id="current_date"></p>
			<script>
date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("current_date").innerHTML = day + "/" + month + "/" + year;
</script>
		</div>
		<br><br><br><br>
		<div>
			<h1>Puskesmas Kelompok 10</h1>
		</div>
		<br><br>
		<hr>
		<h3>Invoice</h3>
		
		<div class="clear-fix"></div>
			<table border='1' cellspacing='0'>
				<tr>
					<th class='text-center' width=10>Nama Pasien</th>
					<th class='text-center' width=50>Signature</th>
					<th class='text-center' width=100>Nama Obat</th>
					<th class='text-center' width=10>Jumlah</th>
					<th class='text-center' width=10>Harga Eceran</th>
					<th class='text-center' width=10>Harga Total</th>
				</tr>

				<tr>
					<td class='text-center'><?php
						include '../koneksi.php';
						$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from pembayaran where id = '$id'");
										while($d=mysqli_fetch_array($det)){
                        ?>
                    	<?php echo $d['nama_pasien'];?>

                        <?php
          }

          ?></td>
					
					<td class='text-center'><?php
						include '../koneksi.php';
						$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from pembayaran where id = '$id'");
										while($d=mysqli_fetch_array($det)){
                        ?>
                    	<?php echo $d['signature'];?>

                        <?php
          }

          ?></td>
					<td class='text-center'><?php
					
						include '../koneksi.php';
						$id=$_GET['id'];
    					$det=mysqli_query($conn, "select * from resep where id_pembayaran = '$id'");
						session_start();
						foreach ($det as $row) {
						
							echo $row['nama_obat']."<br>";
						
							
						};
											
                        ?>
                    	</td>

                        
						<td class='text-center'><?php
					
					include '../koneksi.php';
					$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from resep where id_pembayaran = '$id'");
					
					foreach ($det as $row) {
					
						echo $row['jumlah']."<br>";	
					};
										
					?>

					</td>

											
					<td class='text-center'><?php

					include '../koneksi.php';
					$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from resep where id_pembayaran = '$id'");

					foreach ($det as $row) {

					echo $row['harga']."<br>";


					};
									
					?>

					</td>
					
					<td class='text-center'><?php

					include '../koneksi.php';
					$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from resep where id_pembayaran = '$id'");

					foreach ($det as $row) {
					
					echo $row['harga']*$row['jumlah']."<br>";


					};				
					?>
					</td>

					<tr>
					<td colspan='5' class='text-center'><b>TOTAL</b></td>
					<td class='text-center'><b>
					<?php
						include '../koneksi.php';
						$id=$_GET['id'];
					$det=mysqli_query($conn, "select * from pembayaran where id = '$id'");
										while($d=mysqli_fetch_array($det)){
                        ?>
                    	<?php echo $d['jumlah_tagihan'];?>

                        <?php
          }

          ?>
					</b></td>
					</tr>
			</table>
			<br>
			<br>
			<br>
			<div>
			<form action='' name='proses' method='post'>
			<input id="printPageButton" type="submit" class="btn btn-success" value="Kembali" name="proses">
			</form>
			
		</div>
		</div>
		
	</body>

</html>
<?php

$id = $_GET['id'];


if(isset($_POST['proses'])){
    header("location: ../apotek/index.php?id=".$id);

}

  
   
?>