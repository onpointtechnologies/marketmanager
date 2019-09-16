<?php

require_once '../config/config.php';

$id = $_GET["id"];

$q1 = $db->prepare("SELECT c.`id`, c.`business_name`, c.`sellers_fee`, c.`custom_fee`, c.`checkout_date`, c.`ebt_tokens`, c.`ebt_match`, c.`atm_tokens`, c.`wic_input_checkout`, c.`mm_vouchers`,
                      c.`mm_tokens`, c.`piersons_amount`, c.`fmnp_fvc`, c.`open_door`, c.`fmnp`, c.`fvc`, c.`comment`, c.`vendor_type`, c.`market_id`,
                        c.`total_owed`, v.`vendor_email` FROM checkout AS c LEFT JOIN `vendors` AS v ON
                          v.`business_name` = c.`business_name` WHERE c.`id` = ? GROUP BY (c.`business_name`)");
// ("SELECT * FROM checkout WHERE id = ? ")
$q1->execute([$id]);

$checkout_q = [];
while ($row = $q1->fetch()) {
  array_push($checkout_q, [
    'id' => $row['id'],
    'business_name' => $row['business_name'],
    'checkout_date' => $row['checkout_date'],
    'sellers_fee' => $row['sellers_fee'],
    'ebt_tokens' => $row['ebt_tokens'],
    'ebt_match' => $row['ebt_match'],
    'atm_tokens' => $row['atm_tokens'],
    'wic_input_checkout' => $row['wic_input_checkout'],
    'fmnp' => $row['fmnp'],
    'fvc' => $row['fvc'],
    'mm_vouchers' => $row['mm_vouchers'],
    'mm_tokens' => $row['mm_tokens'],
    'piersons_amount' => $row['piersons_amount'],
    'fmnp_fvc' => $row['fmnp_fvc'],
    'open_door' => $row['open_door'],
    'comment' => $row['comment'],
    'vendor_type' => $row['vendor_type'],
    'custom_fee' => $row['custom_fee'],
    'market_id' => $row['market_id'],
    'percentage_fee' => $row['percentage_fee'],
    'total_owed' => $row['total_owed'],
    'vendor_email' => $row['vendor_email'],
  ]);
}

echo json_encode($checkout_q);

?>
