<?php

require_once '../config/config.php';

$vid = $_GET["vid"];
$marketId = $_GET["marketId"];

//$sql = $db->prepare("Insert into markets_vendors values((SELECT id from markets where market_name = ?), ?)");
//Select * from markets_vendors where vendors_id = 829 and markets_id = (SELECT id from markets where market_name = 'Fortuna Farmers Market')
$sql = $db->prepare("Insert into markets_vendors values(?, ?)");
$sql->execute(array($marketId, $vid));

echo 'Success: ' . $marketId . ' ' . $vid;

?>
