<?php

require_once '../config/config.php';
header('Access-Control-Allow-Origin: *');

$public_id = uniqid();

$currencies = [];
foreach ($_POST['currencies'] as $curr) {

  array_push($currencies, [
    'name' => $curr['name'],
    'value' => $curr['value'],
    'dollarValue' => $curr['dollarValue']
  ]);
  echo $key.' '.$value.'<br>';

  foreach ($curr as $key => $value) {

  }
}


$flat_fee = $_POST['flat_fee']*100;

$sql = $db->prepare("INSERT INTO markets (market_name, market_city, certified, phone, start_date, end_date, flat_fee, percentage_fee, custom_fee, notes, manager_name, certificate_number, cdfa_app_id, market_hours, public_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->execute(array( $_POST["market_name"], $_POST["market_city"], $_POST["certified"], $_POST["phone"], $_POST["start_date"], $_POST["end_date"], $flat_fee, $_POST["percentage_fee"], $_POST["custom_fee"], $_POST["notes"], $_POST["manager_name"], $_POST["certificate_number"],
                      $_POST["cdfa_app_id"], $_POST["market_hours"], $public_id, $authenticated_user));

$market_id = $db->lastInsertId();

foreach ($currencies as $currency) {
  $name = $currency['name'];
  $value = $currency['value'];
  $dollar_value = $currency['dollarValue'];

  $sql = $db->prepare("INSERT INTO market_currency (market_id, market_currency_name, market_currency_value, market_currency_dollar_value) VALUES (?, ?, ?, ?);");
  $sql->execute([$market_id, $name, $value, $dollar_value]);
}

$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;    // Moving Uploaded file




?>
