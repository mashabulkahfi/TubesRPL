<?php
//include("../Template/header.php");
//require("../config.php");

//  Data from register form
    $uname = $_POST['username'];
	$email = $_POST['email'];
	$no_hp=$_POST['no_hp'];
    $pwd = $_POST['password'];
	$nama = $_POST['nama'];
	
	//  Data for accessing database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rpl";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO user(username, email, no_hp, password, nama)
                  VALUES('$uname','$email','$no_hp','$pwd', '$nama')";
        $conn->exec($query);
        $cookie_name = "username";
        $cookie_value = $uname;
        setcookie($cookie_name, $cookie_value, time()+ (86400*30), "/");
        
		header("Location: login.html");
        die();
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
?>
