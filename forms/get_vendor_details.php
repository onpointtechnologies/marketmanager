<?php
require_once '../config/config.php';

$business_name = $_GET["business_name"];

$query = $db->prepare("SELECT * FROM vendors WHERE business_name = ? ");
$query->execute([$business_name]);

//$query_1 = $query->fetch();
      //Vars//
// $email = $query_1['vendor_email'];
// $type = $query_1['vendor_type'];

$vendor_details = [];
while ($row = $query->fetch()) {
  array_push($vendor_details, [
    'email' => $row['vendor_email'],
    'type' => $row['vendor_type']
  ]);
}

echo json_encode($vendor_details);

?>
