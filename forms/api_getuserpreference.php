<?php
require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');

$api_array = array();
$userId = $_GET['id'];

$query = $db->prepare("Select * from api where user_id = '$userId'");
$query->execute();

while($row = $query->fetch()){
        $api_array[]=$row;
 }

echo json_encode($api_array);

?>
