<?php


//  Data for accessing database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rpl";

	$uname = $_POST['username'];
	$pwd = $_POST['password'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM user WHERE username ='$uname' and password = '$pwd'");
    $stmt->execute();
	
    $item = $stmt->fetchAll();
	
    if (count($item) == 0){
        header("Location: login.html");
        die();
    }else{
		if ($item['status_pengguna'] == 0){
			$cookie_name = "username";
			$cookie_value = $uname;
			setcookie($cookie_name, $cookie_value, time()+ 86400, "/");
			header("Location: home.php");
			die();
		}
		else {
			header("Location: login.html");
			die();
		}
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
