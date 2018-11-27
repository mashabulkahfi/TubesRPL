<?php
	$host 		= "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "rpl";
	
    mysqli_connect($host, $username, $password, $dbname);
    mysqli_select_db($dbname);  

?>

<!DOCTYPE html>
<html lang="en">  

<head>

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

	<form method="post" action="#">
	<input type="submit" value="Fashion Pria" name="1">
	<input type="submit" value="Fashion Wanita" name="2">
	<input type="submit" value="Fashion Anak" name="3">
	<input type="submit" value="Gadget" name="4">
	<input type="submit" value="Olahraga" name="5">
	<input type="submit" value="Rumah Tangga" name="6">
</body>

<?php
	if($_POST['1']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Fashion Pria</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Fashion Pria' ";
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
	<?php }
	else if($_POST['2']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Fashion Wanita</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Fashion Wanita' ";
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
	<?php }
	else if($_POST['3']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Fashion Anak</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Fashion Anak' ";
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
	<?php }
	else if($_POST['4']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Gadget</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Gadget' ";
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
	<?php }
	else if($_POST['5']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Olahraga</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Olahraga' ";
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
	<?php }
	else if($_POST['6']){ ?>
		<div class="container">
 		 <div class="row">
		    <div class="col-sm-12">
 		     <h3 style="text-align:center;">Rumah Tangga</h3><br />  
               <div class="container" style="width:700px;">  
                <h3 style="text-align:center;"></h3><br />  
                <?php  
                $query = "SELECT * FROM barang WHERE kategori = 'Rumah Tangga' ";
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
<?php	}
?>