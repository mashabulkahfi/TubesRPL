<?php 
 require('config.php');  
 session_start();  
 $connect = $link;
 ?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Katalog Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>  

           <br />  
           <div class="container" style="width:700px;">  
                <h3 style="text-align:center;">Katalog Barang E-Toko</h3><br />  
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
                
               

           
      </body>  
</html>
