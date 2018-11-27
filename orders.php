<?php
	include_once 'includes/dbh.inc.php';
	include_once 'includes/header.php';
	session_start();
	if ($_COOKIE['username'] == ""){
		header("Location: login.html");
	}
	$uname = $_COOKIE['username'];
?>

<br>
<div>
	<button onclick="location.href='home.php'" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	<h1 align="center">Transaksi</h1>
</div>

<html>
<head>
	<meta charset="UTF-8">
    <title>Orders</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
		background-color: white;
		font-color : black;
	}
	
	h1   {color: black;}
	
	hr {
			border: 5px solid #00000;
			margin-bottom: 25px;
	}
	.container {
			padding: 10px;
		    white-space: nowrap;  
			overflow: hidden;
			text-overflow: ellipsis; ;
			background-color: white;

	}
	
	.btn {
    background-color: Grey; /* Blue background */
    border: none; /* Remove borders */
    color: white; /* White text */
    padding: 12px 16px; /* Some padding */
    font-size: 16px; /* Set a font size */
    cursor: pointer; /* Mouse pointer on hover */
	}

	/* Darker background on mouse-over */
	.btn:hover {
    background-color: Black;
	}
</style>

<body>
	<br>
	<h4 align="center"><strong>Transaksi Anda</strong></h4>
		<?php
			//Query untuk mengambil informasi produk dan transaksi
			$sql = "SELECT * FROM barang LEFT JOIN transaksi ON barang.id_barang = transaksi.id_barang WHERE username = '".$uname."'";
			$result = mysqli_query ($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			
			//Display informasi transaksi
			if ($resultCheck > 0) { 
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<div align='center'>";
						print('ID Transaksi: ');
						echo $row['id_transaksi'] . "<br>";
						print('Tanggal Transaksi: ');
						$dt= new DateTime ($row['tanggal_transaksi']);
						echo $dt->format('Y-m-d'). "<br>";
						print('Alamat Transaksi: ');
						echo $row['alamat_transaksi'] . "<br>";
						echo "<br>";
						echo "<img width='100' height='100' src='gambar_barang/".$row['gambar']."' alt='gambar_barang'>"."<br>";
						print('Id Barang: ');
						echo $row['id_barang'] . "<br>";
						print('Jumlah Barang: ');
						echo $row['jumlah_barang'] . "<br>";
						print('Harga Barang: ');
						echo $row['harga_barang'] . "<br>";
						print('Total Harga: ');
						echo $row['jumlah_barang'] * $row['harga_barang']."<br>";
						print('Status: ');
						echo $row['status']."<br>";;
						echo "</div>";
						echo "<hr>";
					}
			} else {
				print('Belum ada transaksi yang dilakukan');
				echo "<br>";
			}
		?>
	
	<br>
	<br>
	<h4 align="center"><strong>Berikan komentar dan rating</strong></h4>
	<div align="center">  
		<?php
			//Query untuk mencari id produk
			$idprod = "SELECT id_barang FROM transaksi WHERE username = '".$uname."'";
			$prodres = mysqli_query($conn, $idprod);
		?>
		<form action ="" method="POST" enctype="multipart/form-data">
			<label for="idproduk">Id Produk: </label>
			<select name="idproduk">
				<option>-Id Produk-</option>
				<?php while($row1 = mysqli_fetch_array($prodres)):;?>
					<option value="<?php echo $row1[0];?>"><?php echo $row1[0];?></option>
				<?php endwhile;?>
			</select><br>
			<label>Rating: </label>
			<select name="rate">
				<option>-Rating-</option>
				<option value="1">*</option>
				<option value="2">**</option>
				<option value="3">***</option>
				<option value="4">****</option>
				<option value="5">*****</option>
			</select>
			<br><label for="komentar">Komentar: </label>
			<textarea class="form-control" name= "komentar" rows="2" placeholder="Komentar Anda di sini"></textarea>
			<input type="submit" name="submit">
		</form>
	</div>
	
	<?php
		//Memasukan komentar dan rating ke database
		if(isset($_POST['submit'])){
			$rating = $_POST['rate'];
			$idsql = "SELECT username FROM user WHERE username = '".$uname."'";
			$idresult = mysqli_query($conn, $idsql);
			$iduser = mysqli_fetch_assoc ($idresult);

			$conn = mysqli_connect("localhost","root","","rpl");
			$insert = mysqli_query($conn,"INSERT INTO `review`(`id_barang`, `komentar`, `rating`, `username`) VALUES ('".$_POST['idproduk']."','".$_POST['komentar']."','".$rating."','".$iduser['username']."')"); 
		
	        $del = "DELETE FROM `review` WHERE id_barang = 0 OR komentar IS NULL OR rating IS NULL";
			$delres = mysqli_query($conn, $del);
			
			header('location: orders.php?comment=');
		}
	?>

</body>
</html>


