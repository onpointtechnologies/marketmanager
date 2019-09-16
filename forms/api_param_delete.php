<?php

require_once '../config/config.php';


$x = $_GET["id"];

$sql = $db->prepare('DELETE FROM api WHERE user_id = ? AND value = ?');
$sql->execute(array($authenticated_user, $x));

//echo $x;

?>
