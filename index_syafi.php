<?php
	include_once 'includes/dbh.inc.php';
	include_once 'includes/header.php';
?>

<?php session_start();
        $_SESSION['user_uid'] = "Admin";
?>

<h1>Profile</h1>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account</title>
    <link rel="stylesheet" type="text/css.css" href="style.css">
</head>

<body class="bg-light">
<div id="button">
    <button onclick="location.href='profile.php'">Account Detail</button>
    <button onclick="location.href='orders.php'">Orders</button>
</div>
</body>

