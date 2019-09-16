<?php

require_once '../config/config.php';

$id = $_GET["id"];

$sql = $db->prepare("DELETE FROM vendors where ID = ?");
$sql->execute([$id]);

echo 'Success: ' . $id;

?>
