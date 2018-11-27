<?php 
	$host 		= "localhost";
	$username	= "root";
	$password	= "";
	$dbname		= "rpl";

	$connect = mysqli_connect($host, $username, $password, $dbname)
	or die("Salah server, nama pengguna, atau passwordnya!"); 
	
	session_start(); 

		if ($_COOKIE['username'] == ""){
          header("Location: login.html");
      }
	
	
if (isset($_SESSION['var'])){
    $rowdetail =  $_SESSION['var'];
    if (isset($_GET['id_barang'])){
        $count = $_GET['id_barang'];
    }
    else {
        $count = 1;
    }
    $row = $rowdetail[$count-1];
}
else{
    //meload query barang jika belum ada data
    $querybarang = "SELECT * FROM barang ORDER BY id_barang ASC";  
    $resultbarang = mysqli_query($connect, $querybarang);
    if(mysqli_num_rows($resultbarang) > 0)  
                {  
                    $countbarang = 0;
                     while($rowbarang = mysqli_fetch_array($resultbarang))  
                     {  
                        $rowdetail[$countbarang] = $rowbarang;
                        $countbarang++;
                     }
                    }
    $row = $rowdetail[$countbarang-1];
                
}

//Menambahkan rating
 if(isset($_POST['submit'])) {
     $komentar = $_POST['inputKomentar'];
     $rating = $_POST['inputRating'];
     $userid = $_POST['inputUserId'];
    $reviewquery = "INSERT INTO `review` (`id_barang`, `komentar`, `rating`, `id_user`) VALUES
    ('$count', '$komentar', '$rating', '$userid');"; 
   $resultquery = mysqli_query($connect, $reviewquery); 
}

 ?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Info Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 
<div style="display:flex">
<a style ="position: fixed; margin-left: 10px; margin-right: 50px;" href="home.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-list-alt"></span> Katalog
        </a>
    <a href="pilihbarang.php?id_barang=<?php 
    if($row["id_barang"] > 1){
        echo ($row["id_barang"]-1);
    } else {
        echo $row["id_barang"];
    }
     ?>" style="position: fixed; left: 150px; font-size: 20px;"><span class="glyphicon glyphicon-menu-left"></span>Previous Item</a>    
    <a style="position: fixed; right: 100px; font-size: 20px;" href="pilihbarang.php?id_barang=<?php 
    if($row["id_barang"] < count($rowdetail) ){
        echo ($row["id_barang"]+1);
    } else {
        echo $row["id_barang"];
    }
     ?>">Next Item<span class="glyphicon glyphicon-menu-right"></span></a>    

</div>

    <div class="container" style="width:700px;">  
        <h3 style="text-align:center;"><?php echo $row["nama_barang"]; ?> </h3><br />
        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; text-align: center;margin-bottom: 20px;" >  
             <img src="img/<?php echo $row["gambar"]; ?>"  style="max-width: 100%; height: 300px;" ><br />  
             <h4 class="text-danger">Rp <?php echo $row["harga"]; ?></h4> 
            <div>
                <h5 class="h5"><strong>Deskripsi Barang</strong></h5>
                 <p><?php echo $row["deskripsi"];  ?> </p>
                 <h5 class="h5"><strong>Kategori</strong></h5>
                 <p><?php echo $row["kategori"];  ?> </p> 
                 <h5 class="h5"><strong>Dimensi Barang</strong></h5>
					<h5 class="h5"><strong>Tinggi</strong></h5>
					<p><?php echo $row["tinggi"];  ?> </p>
					<h5 class="h5"><strong>Lebar</strong></h5>
					<p><?php echo $row["lebar"];  ?> </p>
					<h5 class="h5"><strong>Panjang</strong></h5>
					<p><?php echo $row["panjang"];  ?> </p>					
                 <h5 class="h5"><strong>Stok Tersedia</strong></h5>
                 <p><?php echo $row["stok"];  ?> </p>
                 <h5 class="h5"><strong>Review</strong></h5>
                <?php  
					$sql = "SELECT * FROM review WHERE id_barang = '$count' "; 
					$result = mysqli_query($connect, $sql); 
					$ratingcount = 0;
					$ratingsum = 0;
					echo $count;
					
					if(mysqli_num_rows($result) > 0)  
					{  
						 while($review = mysqli_fetch_array($result))  
						 {  
                ?>
                 <p>User <?php echo $review['username']; ?> </p>
                 <p style="font-family: monospace; font-size: 50px; color: orange;"> 
                 <?php 
                    $ratingsum = $ratingsum + $review['rating'];
                    $ratingcount++;
                 ?> 
                 <p><?php echo $review['komentar']; ?> </p>
                 <?php  
               
                        }  
                 }  
                ?>     
                 <p>Rating</p>
                 <p style="font-family: monospace; font-size: 50px; color: orange;">
                 <?php
                    if ($ratingsum != 0){
                   $ratingmean =round($ratingsum/$ratingcount);
                   for($i = 0; $i < $ratingmean; $i++){
                       echo "*";
                   }
                }
                 ?>
                 </p>
                <h5 class="h5"><strong>Berikan komentar dan rating Anda<strong></h5>
                <form method="post" action= "pilihbarang.php?id_barang=<?php echo $row['id_barang']; ?>" >
                    
                        <label for="inputUserId">User Id</label>
                        <input type="text" class="form-control" name="inputUserId" placeholder="1">
                    
                        <label for="inputKomentar">Komentar</label>
                        <textarea class="form-control" name="inputKomentar" rows="3" placeholder="Komentar Anda di sini"></textarea>
                    
                    <input class="form-check-input" type="radio" name="inputRating" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">*</label>
                   
                    <input class="form-check-input" type="radio" name="inputRating" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">**</label>
                    
                    <input class="form-check-input" type="radio" name="inputRating" id="inlineRadio2" value="3">
                    <label class="form-check-label" for="inlineRadio2">***</label>
                    
                    <input class="form-check-input" type="radio" name="inputRating" id="inlineRadio2" value="4">
                    <label class="form-check-label" for="inlineRadio2">****</label>
                   
                    <input class="form-check-input" type="radio" name="inputRating" id="inlineRadio2" value="5">
                    <label class="form-check-label" for="inlineRadio2">*****</label>
                  
                    <input type="submit" name="submit" class="btn btn-primary mb-2">
                </form>
               
                </div>
        </div>    
    </div>
</body>  
</html>