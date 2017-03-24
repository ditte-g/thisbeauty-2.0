<?php

require("auth.php"); //include auth.php file on all secure pages
require('db.php');

$email = $_SESSION['email'];

//Visar användarinformation på mina sidor
$stm_select = $pdo->prepare('SELECT * FROM `users` WHERE email = :email');
$stm_select->execute(['email' => $email]);
$result = $stm_select->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);