<?php

require_once '../config/config.php';

$id = $_GET["id"];

$sql = $db->prepare("SELECT market_name, id FROM markets WHERE user_id = ? ");
$sql->execute(array($id));

$markets = [];
while ($row = $sql->fetch()) {
  array_push($markets, [
    'id' => $row['id'],
    'name' => $row['market_name'],
    //$row['id'] => $row['market_name'],
  ]);
}

echo json_encode($markets);

?>
