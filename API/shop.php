<?php
require 'db.php';

/*Shows all products*/
$stm_select = $pdo->prepare('SELECT `name`, `price`, `description`, `pic` FROM `products`');
$stm_select->execute([]);
$result = $stm_select->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: application/json;charset=utf-8");
echo json_encode($result);
