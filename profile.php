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
	<button onclick="location.href='home.php'" class="btn"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	<h1 align="center">Detail Akun</h1>
</div>


<html>
	

<head>
	<meta charset="UTF-8">
    <title>Account Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
		background-color: black;
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

<body class="bg-lights">	
	<div class="container" align="center">
		<div align="right">
			<button onclick="location.href='editprofile.php'" class="btn"><i class='fa fa-gears'></i></button>
		</div>
		<?php		
			//Query untuk mengambil informasi user dari database
			$sqlProf = "SELECT *FROM user WHERE username= '".$uname."';";
			$resultProf = mysqli_query($conn, $sqlProf);
			$resultProfCheck = mysqli_num_rows($resultProf);

			//Display informasi user
			if ($resultProfCheck > 0) {
				while ($row = mysqli_fetch_assoc($resultProf)) {
					if($row['photo'] == ""){
						echo "<img width='250' height='250' src='image_upload/default.jpg' alt='Default Profile Pic'>";
					} else {
						echo "<img width='250' height='250' src='image_upload/".$row['photo']."' alt='Profile Pic'>";
					}
					echo "<br>";
					echo "<br>";
					print('Username: ');
					echo $row['username'] . "<br>";
					print('E-Mail: ');
					echo $row['email'] . "<br>";
					print('Nama: ');
					echo $row['nama'] . "<br>";
					print('No. HP: ');
					echo $row['no_hp'] . "<br>";
					print('Password: ');
					echo $row['password'] . "<br>";
				}
			}
		?>
	</div>
</body>
</html>
