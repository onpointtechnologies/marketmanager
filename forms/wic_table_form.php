<?php
require_once '../config/config.php';


$q1 = $db->prepare("SELECT * FROM wic WHERE checkout_date = ? AND market_id = ? ");
$q1->execute(array($_POST["checkout_date"], $_POST["market_id"]));

$wic_table = [];
while ($row = $q1->fetch()) {
  array_push($wic_table, [
    'id' => $row['id'],
    'wic_number' => $row['wic_number'],
    'wic_amount' => $row['wic_amount'],
    'mm_amount' => $row['mm_amount'],
    'customer_type' => $row['customer_type']
  ]);
}

echo json_encode($wic_table);
//echo json_encode($final_array);

?>
