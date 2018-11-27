<?php
	include_once 'includes/dbh.inc.php';
	include_once 'includes/header.php';
	if ($_COOKIE['username'] == ""){
          header("Location: login.html");
      }
	$uname = $_COOKIE['username'];
?>

<br>
<div>
	<button onclick="location.href='profile.php'" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	<h1 align ="center">Edit Akun</h1>
</div>

<html>
<head>
	<meta charset="UTF-8">
    <title>Account Detail</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
		background-color: Black;
		font-color : white;
	}
	
	h1   {color: white;}
	
	.container {
			padding: 10px;
		    white-space: nowrap; 
			width: 25em; 
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
	<div class="container" align="center">		
		<?php
			$conn = mysqli_connect("localhost","root","","rpl");
			if (empty($_POST['email'])){
				$e_mail = mysqli_query($conn,"SELECT email FROM user WHERE username = '".$uname."'");
			} else{
				$e_mail = $_POST['email'];
			}
			if (empty($_POST['nama'])){
				$name = mysqli_query($conn,"SELECT nama FROM user WHERE username = '".$uname."'");
			} else{
				$name = $_POST['nama'];				
			}
			if (empty($_POST['no_hp'])){
				$nohp = mysqli_query($conn,"SELECT no_hp FROM user WHERE username = '".$uname."'");
			} else{
				$nohp = $_POST['no_hp'];
			}
			if (empty($_POST['password'])){
				$pass = mysqli_query($conn,"SELECT password FROM user WHERE username = '".$uname."'");
			} else{
				$pass = $_POST['password'];
			}
			
			if(isset($_POST['submit'])){
						move_uploaded_file($_FILES['file']['tmp_name'],"image_upload/".$_FILES['file']['name']);
						$photo = mysqli_query($conn,"UPDATE user SET photo = '".$_FILES['file']['name']."' WHERE username = '".$uname."'");
			}
			
			if(isset($_POST['edit'])){
						$info = mysqli_query($conn,"UPDATE user SET email='".$e_mail."', no_hp = '".$nohp."', password='".$pass."', nama = '".$name."'  WHERE username = '".$uname."'");
					
			}
			
			$sqlProf = "SELECT *FROM user WHERE username= '".$uname."';";
			$resultProf = mysqli_query($conn, $sqlProf);
			$resultProfCheck = mysqli_num_rows($resultProf);
					
		?>
		
		<div align="center">
        <form name="edit_profile" method="POST" action="" enctype="multipart/form-data" onsubmit="return validate_form();">
            <table width="60%">
                <tr>
                  <?php $foto =  $item[0]['photo'];
                  if ($foto == NULL)
                    $foto = "image_upload/default.jpg"
                  ?>
                    <td><img src="<?php echo $foto;?>" id="picturesize" class="borderimg"></td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td width="100%"><h3 class="proftext">Update profile picture</h3></td>
                            </tr>
                            <tr>
                                <td><input type="text" id="updatePicture" name="picture" value=""></td>
                                <td><label id="browse">Browse...
                                        <input type="file" id="picture_file" name="picture_file" class="displayfile" onchange="picturefile()">
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" value="Save" class="save" id="save"></td>
                </tr>
            </table>
        </form>
    </div>
		
		<form action="" method="post" align="right" enctype="multipart/form-data">			
			<h5><strong>Edit profil</strong></h5>
			<label for="email">e-mail</label>
			<input type="text" name="email" placeholder="e-mail"><br>
					
			<label for="nama">Nama</label>
			<input type="text" name="nama" placeholder="Nama"><br>
											
			<label for="no_hp">No. HP</label>
			<input type="text" name="no_hp" placeholder="No. HP"><br>

			<label for="password">Password</label>
			<input type="password" name="password" placeholder="Password"><br>

			<button type="submit" name ="edit" class="btn">Simpan</button>  
		</form>
	</div>	
</body>

<script>
    function picturefile(){
        document.getElementById('updatePicture').value = document.getElementById('picture_file').files[0].name;
    }
</script>
</html>
