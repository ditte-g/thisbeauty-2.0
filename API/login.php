<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
    if (isset($_POST['femail'], $_POST['fpassword'])){
	$email = $_POST['femail'];
	$password = $_POST['fpassword'];
	$salt1 = "18gI%f5A";
	$salt2 = "@Y4p91bN";
	$salt_password = md5($salt1.$password.$salt2);
	
	$sql = "SELECT COUNT(*) AS 'qty' FROM `users` WHERE email = :email and password = :password";
	$stm_count = $pdo->prepare($sql);
	$stm_count->execute(['email' => $email, 'password' => $salt_password]);
	foreach( $stm_count as $row ) {
		$qty = $row['qty'];
	}
	
	if( $qty > 0 ) {
		$_SESSION['email'] = $email;
		header("Location: index.php");
	}
	else {
		echo json_encode(false);
	}
}