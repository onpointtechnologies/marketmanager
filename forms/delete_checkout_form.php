<?php

require_once '../config/config.php';

$id = $_GET["id"];

$sql = $db->prepare("DELETE FROM checkout where ID = ?");
$sql->execute([$id]);

echo 'Success: ' . $id;

?>
