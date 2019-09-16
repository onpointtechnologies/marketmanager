<?php
require_once '../config/config.php';

$date_data = $_POST['date'];
//$wk_data = $_POST['week'];
$market_id = $_POST['market_id'];


//$sql = "SELECT * FROM checkout WHERE checkout_date = '$date_data' AND market_id = '$market_id' ";
// $sql = $db->query($sql);

$query = $db->prepare("SELECT * FROM checkout WHERE checkout_date = ? AND market_id = ? ");
$query->execute(array($date_data, $market_id));

$q2 = $db->prepare("SELECT * FROM market_currency  WHERE market_public_id = ? ");
$q2->execute(array($market_id));
$currency_names = [];
while ( $result = $q2->fetch()){
  array_push($currency_names, $result['market_currency_name']);
}

$checkout_table = [];
while ($row = $query->fetch()) {
  array_push($checkout_table, [
    'name' => $row['business_name'],
    'paid' => $row['total_owed'],
    'custom_fee' => $row['custom_fee'],
    'ebt_tokens' => $row['ebt_tokens'],
    'ebt_match' => $row['ebt_match'],
    'mm_tokens' => $row['mm_tokens'],
    'mm_vouchers' => $row['mm_vouchers'],
    'fmnp_fvc' => $row['fmnp_fvc'],
    'open_door' => $row['open_door'],
    'piersons_amount' => $row['piersons_amount'],
    'atm_tokens' => $row['atm_tokens'],
    'wic_input_checkout' => $row['wic_input_checkout'],
    'market_bucks' => $row['market_bucks'],
    'fmnp' => $row['fmnp'],
    'fvc' => $row['fvc'],
    'id' => $row['id']
  ]);
}

$name_count = count($checkout_table);
$custom_fee = 0;
$owed_count = 0;
$ebt_token_count = 0;
$ebt_match_count = 0;
$mm_token_count = 0;
$mm_voucher_count = 0;
$fmnp_count = 0;
$open_door_count = 0;
$pierson_count = 0;
$atm_count = 0;
$wic_input_checkout = 0;
$fmnp = 0;
$fvc = 0;
$market_bucks = 0;



foreach ($checkout_table as $item) {
    $owed_count += $item['paid'];
    $custom_fee += $item['custom_fee'];
    $ebt_match_count += $item['ebt_match'];
    $ebt_token_count += $item['ebt_tokens'];
    $mm_token_count += $item['mm_tokens'];
    $mm_voucher_count += $item['mm_vouchers'];
    $fmnp_count += $item['fmnp_fvc'];
    $open_door_count += $item['open_door'];
    $pierson_count += $item['piersons_amount'];
    $atm_count += $item['atm_tokens'];
    $wic_input_checkout += $item['$wic_input_checkout'];
    $fmnp += $item['fmnp'];
    $fvc += $item['fvc'];
    $market_bucks += $item['$market_bucks'];
}



echo json_encode($checkout_table);
//echo json_encode($final_array);

?>
