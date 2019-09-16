<?php
/*if ($_POST['submit']) {
  $sql = $db->prepare("INSERT INTO market (market_name, certified, address, city, state, phone, email, start_date, end_date, created_at, updated_at, flat_fee, percentage_fee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
  $sql->execute( $_POST["market_name"], $_POST["certified"], $_POST["address"], $_POST["city"], $_POST["state"], $_POST["phone"], $_POST["email"], $_POST["start_date"], $_POST["end_date"],

}*/

require_once '../config/config.php';

$id = $_GET['id'];

$sql = $db->prepare("UPDATE markets SET market_name = ?, market_city = ?, certified = ?, phone = ?, start_date = ?, end_date = ?, flat_fee = ?, percentage_fee = ? WHERE public_id = ?";
$sql->execute(array( $_POST["market_name"], $_POST["market_city"], $_POST["certified"], $_POST["phone"], $_POST["start_date"], $_POST["end_date"], $_POST["flat_fee"], $_POST["percentage_fee"], $_POST["public_id"]));




?>
