<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rpl";
$uname = $_COOKIE['username'];

if ($_COOKIE['username'] == ""){
    header("Location: login.html");
}


$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection){
        die("Connection Failed:".mysqli_connect_error());
    }
//$uname = $_POST['username'];
$sql = "SELECT s.nama_barang, jumlah, harga FROM cart c JOIN barang s USING (id_barang) WHERE c.username='$uname' " ;
$query = mysqli_query($connection,$sql);
?>
<form action="" method="post">
    <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $data["nama_barang"];?></td>
            <td><?php echo $data["jumlah"];?></td>
            <td>Rp<?php echo $data["harga"];?></td>
            <td>Rp<?php echo number_format($data["jumlah"] * $data[harga],2);?></td>
            <td>
                <a href="hapus.php?id=<?php echo $data['id']; ?>">Delete</a>                 
            </td>
        </tr>
        <?php $no++; } ?>
        <?php } ?>
    </table>
</form>
<form method="post" action="formtransaksi.php">
		<button type="submit">Checkout</button>
</form>
