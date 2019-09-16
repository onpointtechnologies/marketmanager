<?php

require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST');
// header('Access-Control-Max-Age: 604800');
// header('Access-Control-Allow-Headers: x-requested-with');
$vendor_row_id = $_POST['vendor_row_id'];

if (empty($vendor_row_id)) {

  echo 'insert';
$sql = $db->prepare('
 INSERT INTO vendors
 SET vendor_name = :vendor_name,
 users_id = :users_id,
 business_name = :business_name,
 address = :address,
 vendor_city = :vendor_city,
 vendor_state = :vendor_state,
 vendor_phone = :vendor_phone,
 vendor_email = :vendor_email,
 certificate_expiration = :cert_exp,
 certificate_number = :cert_num,
 cpc_number = :cpc_number,
 cpc_number_exp = :cpc_number_exp,
 vendor_type = :vendor_type,
 products_sold = :products_sold,
 product_location = :product_location,
 website = :website,
 facebook = :facebook,
 instagram = :instagram,
 electronic_payment =:electronic_payment,
 wic_approved = :wic_approved,
 wic_exp = :wic_exp,
 wic_number = :wic_number
');
$sql->bindParam(':vendor_name', $_POST['vendor_name'], \PDO::PARAM_STR);
$sql->bindParam(':users_id', $_POST['users_id'], \PDO::PARAM_STR);
$sql->bindParam(':business_name', $_POST['business_name'], \PDO::PARAM_STR);
$sql->bindParam(':address', $_POST['address'], \PDO::PARAM_STR);
$sql->bindParam(':vendor_city', $_POST['vendor_city'], \PDO::PARAM_STR);
$sql->bindParam(':vendor_state', $_POST['vendor_state'], \PDO::PARAM_STR);
$sql->bindParam(':vendor_phone', $_POST['vendor_phone'], \PDO::PARAM_STR);
$sql->bindParam(':vendor_email', $_POST['vendor_email'], \PDO::PARAM_STR);
$sql->bindParam(':cert_exp', $_POST['certificate_expiration'], \PDO::PARAM_STR);
$sql->bindParam(':cert_num', $_POST['certificate_number'], \PDO::PARAM_STR);
$sql->bindParam(':cpc_number', $_POST['cpc_number'], \PDO::PARAM_STR);
$sql->bindParam(':cpc_number_exp', $_POST['cpc_number_exp'], \PDO::PARAM_STR);
$sql->bindParam(':vendor_type', $_POST['vendor_type'], \PDO::PARAM_STR);
$sql->bindParam(':products_sold', $_POST['products_sold'], \PDO::PARAM_STR);
$sql->bindParam(':product_location', $_POST['product_location'], \PDO::PARAM_STR);
$sql->bindParam(':website', $_POST['website'], \PDO::PARAM_STR);
$sql->bindParam(':facebook', $_POST['facebook'], \PDO::PARAM_STR);
$sql->bindParam(':instagram', $_POST['instagram'], \PDO::PARAM_STR);
$sql->bindParam(':electronic_payment', $_POST['electronic_payment'], \PDO::PARAM_STR);
$sql->bindParam(':wic_approved', $_POST['wic_approved'], \PDO::PARAM_STR);
$sql->bindParam(':wic_exp', $_POST['wic_exp'], \PDO::PARAM_STR);
$sql->bindParam(':wic_number', $_POST['wic_number'], \PDO::PARAM_STR);
$sql->execute();

$vendor_id = $db->lastInsertId();

//$market_id = $_POST['choose_market'];

$sql = $db->prepare('INSERT INTO markets_vendors SET markets_id = :market_id, vendors_id = :vendor_id');
//$sql = $db->prepare('INSERT INTO markets_vendors SET  markets_id = 3, vendors_id = 83');
$sql->bindParam('vendor_id', $vendor_id, \PDO::PARAM_INT);
$sql->bindParam('market_id', $market_id, \PDO::PARAM_INT);
foreach ($_POST['choose_market'] as $market_id) {
 $sql->execute();
}

} else {

  echo 'update';

  $sql = $db->prepare("
   UPDATE vendors
   SET vendor_name = :vendor_name,
   business_name = :business_name,
   address = :address,
   vendor_city = :vendor_city,
   vendor_state = :vendor_state,
   vendor_phone = :vendor_phone,
   vendor_email = :vendor_email,
   certificate_expiration = :cert_exp,
   certificate_number = :cert_num,
   cpc_number = :cpc_number,
   cpc_number_exp = :cpc_number_exp,
   vendor_type = :vendor_type,
   products_sold = :products_sold,
   product_location = :product_location,
   website = :website,
   facebook = :facebook,
   instagram = :instagram,
   electronic_payment = :electronic_payment,
   wic_approved = :wic_approved,
   wic_exp = :wic_exp,
   wic_number = :wic_number
   WHERE id = :parameter
  ");
  $sql->bindParam(':vendor_name', $_POST['vendor_name'], \PDO::PARAM_STR);
  $sql->bindParam(':business_name', $_POST['business_name'], \PDO::PARAM_STR);
  $sql->bindParam(':address', $_POST['address'], \PDO::PARAM_STR);
  $sql->bindParam(':vendor_city', $_POST['vendor_city'], \PDO::PARAM_STR);
  $sql->bindParam(':vendor_state', $_POST['vendor_state'], \PDO::PARAM_STR);
  $sql->bindParam(':vendor_phone', $_POST['vendor_phone'], \PDO::PARAM_STR);
  $sql->bindParam(':vendor_email', $_POST['vendor_email'], \PDO::PARAM_STR);
  $sql->bindParam(':cert_exp', $_POST['certificate_expiration'], \PDO::PARAM_STR);
  $sql->bindParam(':cert_num', $_POST['certificate_number'], \PDO::PARAM_STR);
  $sql->bindParam(':cpc_number', $_POST['cpc_number'], \PDO::PARAM_STR);
  $sql->bindParam(':cpc_number_exp', $_POST['cpc_number_exp'], \PDO::PARAM_STR);
  $sql->bindParam(':vendor_type', $_POST['vendor_type'], \PDO::PARAM_STR);
  $sql->bindParam(':products_sold', $_POST['products_sold'], \PDO::PARAM_STR);
  $sql->bindParam(':product_location', $_POST['product_location'], \PDO::PARAM_STR);
  $sql->bindParam(':website', $_POST['website'], \PDO::PARAM_STR);
  $sql->bindParam(':facebook', $_POST['facebook'], \PDO::PARAM_STR);
  $sql->bindParam(':instagram', $_POST['instagram'], \PDO::PARAM_STR);
  $sql->bindParam(':electronic_payment', $_POST['electronic_payment'], \PDO::PARAM_STR);
  $sql->bindParam(':wic_approved', $_POST['wic_approved'], \PDO::PARAM_STR);
  $sql->bindParam(':wic_exp', $_POST['wic_exp'], \PDO::PARAM_STR);
  $sql->bindParam(':wic_number', $_POST['wic_number'], \PDO::PARAM_STR);
  $sql->bindParam(':parameter', $vendor_row_id, \PDO::PARAM_STR);
  $sql->execute();

};








?>
