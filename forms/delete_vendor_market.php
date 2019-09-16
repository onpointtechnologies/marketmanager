<?php

require_once '../config/config.php';

$vid = $_GET["vid"];
$marketId = $_GET["marketId"];

//$sql = $db->prepare("DELETE FROM markets_vendors where vendors_id = ? and markets_id = (SELECT id from markets where market_name = ?)");
$sql = $db->prepare("DELETE FROM markets_vendors where vendors_id = ? and markets_id = ?");
$sql->execute(array($vid, $marketId));

echo 'Success: ' . $marketId . ' ' . $vid;

?>
