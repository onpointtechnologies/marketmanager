<?php
require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');


$userId = intval($_GET['id']);
$api_array = array('vendor_name');

$query = $db->prepare('SELECT mv.vendors_id, v.id, v.vendor_name, v.users_id, v.vendor_phone, v.business_name, v.vendor_email, v.vendor_type, v.address, v.vendor_city, v.website, v.facebook, v.instagram, v.cpc_number, v.cpc_number_exp, v.certificate_expiration,
  v.certificate_number, v.products_sold, v.product_location, v.electronic_payment, v.wic_approved, v.wic_exp, v.wic_number, GROUP_CONCAT(m.id) market_ids, GROUP_CONCAT(m.market_name) market_names FROM vendors v LEFT JOIN markets_vendors mv ON mv.vendors_id = v.id
          LEFT JOIN markets m ON mv.markets_id = m.id WHERE v.users_id = ? GROUP BY v.id ');
$query->execute(array($userId));

$api_details = [];
while ($row = $query->fetch()) {
  array_push($api_details, [
    'name' => in_array('vendor_name', $api_array) ? $row['vendor_name'] : "Not Listed ",
    'phone' => $row['vendor_phone'],
    'business_name' => $row['business_name'],
    'address' => $row['address'],
    'email' => $row['vendor_email'],
    'type' => $row['vendor_type'],
    'city' => $row['vendor_city'],
    'website' => $row['website'],
    'facebook' => $row['facebook'],
    'instagram' => $row['instagram'],
    'email' => $row['vendor_email'],
    'products_sold' => $row['products_sold'],
    'product_location' => $row['product_location']

  ]);
}

echo json_encode($api_details);
//echo json_encode($userId);


?>
