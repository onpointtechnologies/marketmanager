<?php

require_once '../config/config.php';

$id = $_GET["id"];
// $q1 = $db->prepare("SELECT * FROM vendors WHERE id = ? ");
// $q1->execute([$id]);

$q1 = $db->prepare(' SELECT mv.vendors_id, v.id, v.vendor_name, v.users_id, v.vendor_phone, v.business_name, v.vendor_email, v.vendor_type, v.address, v.vendor_city, v.vendor_state, v.website, v.facebook, v.instagram, v.certificate_expiration,
  v.certificate_number, v.cpc_number, v.products_sold, v.electronic_payment, v.wic_approved, v.wic_exp, v.wic_number, GROUP_CONCAT(m.id) market_ids, GROUP_CONCAT(m.market_name) market_names FROM vendors v LEFT JOIN markets_vendors mv ON mv.vendors_id = v.id
          LEFT JOIN markets m ON mv.markets_id = m.id WHERE v.id = ? GROUP BY v.id ');
$q1->execute(array($id));

$vendor_details = [];
while ($row = $q1->fetch()) {
  array_push($vendor_details, [
    'id' => $row['id'],
    'vendor_name' => $row['vendor_name'],
    'business_name' => $row['business_name'],
    'address' => $row['address'],
    'vendor_city' => $row['vendor_city'],
    'vendor_state' => $row['vendor_state'],
    'vendor_phone' => $row['vendor_phone'],
    'vendor_email' => $row['vendor_email'],
    'certificate_expiration' => $row['certificate_expiration'],
    'certificate_number' => $row['certificate_number'],
    'cpc_number' => $row['cpc_number'],
    'issuing_county' => $row['issuing_county'],
    'vendor_type' => $row['vendor_type'],
    'products_sold' => $row['products_sold'],
    'website' => $row['website'],
    'facebook' => $row['facebook'],
    'instagram' => $row['instagram'],
    'electronic_payment' => $row['electronic_payment'],
    'organic' => $row['organic'],
    'wic_approved' => $row['wic_approved'],
    'wic_exp' => $row['wic_exp'],
    'wic_number' => $row['wic_number'],
    'market_names' => $row['market_names']

  ]);
}

echo json_encode($vendor_details);

?>
