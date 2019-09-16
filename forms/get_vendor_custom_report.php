<?php
require_once '../config/config.php';


$vendor_id = $_POST['vendor_id'];



// State Report
$query = $db->prepare('SELECT * FROM vendors WHERE users_id = ? AND id = ?');
$query->execute(array($authenticated_user, $vendor_id));

$vendor_info = [];
while ($row = $query->fetch()) {
  array_push($vendor_info, [
    'id' => $row['id'],
    'business_name' => $row['business_name'],
    'certificate_number' => $row['certificate_number'],
    'certificate_expiration' => $row['certificate_expiration'],
    'business_name' => $row['business_name'],
    'issuing_county' => $row['issuing_county'],
  ]);
}

echo json_encode($vendor_info);


?>
