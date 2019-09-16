<?php

require_once '../config/config.php';

$q1 = $db->prepare("SELECT * from wic where id = ? ");
$q1->execute([$_GET["id"]]);

$wic_edit = [];
while ($row = $q1->fetch()) {
  array_push($wic_edit, [
    'id' => $row['id'],
    'wic_number' => $row['wic_number'],
    'wic_amount' => $row['wic_amount'],
    'mm_amount' => $row['mm_amount'],
    'customer_type' => $row['customer_type']
  ]);
}

echo json_encode($wic_edit);

?>
