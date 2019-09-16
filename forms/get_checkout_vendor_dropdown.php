<?php
require_once '../config/config.php';

$date = $_POST['date'];
$id_market_short = $_POST['id_market_short'];

$market_sql = $db->prepare("
 SELECT v.business_name, v.vendor_email, v.vendor_type
 FROM vendors v,
 markets_vendors mv
 WHERE mv.vendors_id = v.id
 AND mv.markets_id = ? ORDER by business_name ");
$market_sql->execute(array($id_market_short));

$disabled_vendors = $db->prepare("SELECT business_name FROM checkout WHERE checkout_date = ?  ");
$disabled_vendors->execute(array($date));

$vendor_list_db = [];
while ( $result = $market_sql->fetch()){
  array_push($vendor_list_db, $result['business_name']);
}

$greyed_vendor = [];
while ( $result = $disabled_vendors->fetch()){
  array_push($greyed_vendor, $result['business_name']);
}

$vendor_list = array_diff($vendor_list_db, $greyed_vendor);


// <option id="vendor_option" value = "">Select</option>

   // foreach ($vendor_list as $checked_out_vendors => $a)
   //  {
   //    echo '<option  value="'.htmlspecialchars($a).'">'.htmlspecialchars($a).'</option>';
   //  }

   array_unshift($vendor_list, "Choose Vendor");

echo json_encode($vendor_list);
   ?>
