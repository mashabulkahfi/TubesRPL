<?php 
	$host 		= "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "rpl";

	$link = mysqli_connect($host, $username, $password, $dbname)
	or die("Salah server, nama pengguna, atau passwordnya!"); 
	session_start();  
	$connect = $link;
	
      if ($_COOKIE['username'] == ""){
          header("Location: login.html");
      }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
      height: 200px;
      background: #aaa;
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
      <a class="navbar-brand" href="#">E-toko</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Kategori</a></li>
        <li><a href="orders.php">Order</a></li>
		<li><a href="#">Chat</a></li>
		<li><a href="cart.php">Cart</a></li>
		<li><a href="profile.php">Profile</a></li>
		<li><a href="logout.php">Signout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h3 style="text-align:center;">Katalog Barang E-Toko</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang ORDER BY id_barang ASC";  
                $result = mysqli_query($connect, $query);  
                $count = 0;
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
               
                
                <div class="col-md-4"> 
                <?php 
                $rowdetail[$count] = $row; 
                
                
                ?>
                
                 <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; text-align: center;margin-bottom: 20px;" >  
                               <img src="img/<?php echo $row["gambar"]; ?>"  style="max-width: 100%; height: 150px;" ><br />  
                               <h4 class="text-info"><?php echo $row["nama_barang"]; ?></h4>  
                               <h4 class="text-danger">Rp <?php echo $row["harga"]; ?></h4> 
                               <a href="pilihbarang.php?id_barang=<?php echo $row["id_barang"] ?>" class="btn btn-danger">Detail</a>
                                
                </div>         
                  <div><?php $count++; ?></div>
                 
                </div>  
                <?php  
               
                     }  

                }  
                ?>  
                <div><?php  $_SESSION['var']=$rowdetail; ?></div> 
    </div>
  </div>
</div>

<?php $uname = $_COOKIE['username'];
                echo $username; ?>

</body>
</html>
