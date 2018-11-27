<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rpl";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
        die("Connection Failed:".mysqli_connect_error());
    }
$id = $_GET['id'];
$uname = $_POST['username'];
mysql_query("DELETE FROM cart WHERE username=$uname AND id_barang='$id'")or die(mysql_error());
 
header("location:index.php?pesan=hapus");
?>
