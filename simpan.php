<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rpl";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
        die("Connection Failed:".mysqli_connect_error());
    }
// menyimpan data kedalam variabel
$tanggal        = $_POST['tanggal'];
$tanggal        = date('Y-m-d', strtotime($tanggal));
$alamat         = $_POST['alamat'];
$metode	        = $_POST['metode'];
$foto 			= $_FILES['foto']['name'];
$tmp 			= $_FILES['foto']['tmp_name'];
$fotobaru 		= date('dmYHis').$foto;    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
$path 			= "images/".$fotobaru;    // Set path folder tempat menyimpan fotonya
$uname = $_POST['username'];

// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
	// Proses simpan ke Database
	// query SQL untuk insert data
	$query="INSERT INTO transaksi SET tanggal_transaksi='$tanggal',alamat_pengiriman='$alamat',metode_pembayaran='$metode',status_pemrosesan='sudah dibayar',bukti_pembayaran='.$fotobaru.'";
	$sql = mysqli_query($connection, $query);
	$query="DELETE FROM cart WHERE username=$uname";
	$sql = mysqli_query($connection, $query);
		
	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header("location: index.php"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='formtransaksi.php'>Kembali Ke Form</a>";
	}
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='formtransaksi.php'>Kembali Ke Form</a>";
}
	
?>
