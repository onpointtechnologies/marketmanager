<?php

require_once '../config/config.php';

$checkout_row_id = $_POST['checkout_row_id'];

$public_id = uniqid();
$market_id = $_GET['vendor_id'];


  if ($checkout_row_id == NULL) {

      $sql = $db->prepare('INSERT INTO checkout (business_name, checkout_date, sellers_fee, ebt_match, ebt_tokens, mm_tokens, mm_vouchers, fmnp_fvc, open_door, piersons_amount, comment,
                           atm_tokens, wic_input_checkout, fmnp, fvc, market_bucks, market_id, vendor_type, total_owed, checkout_market_name, custom_fee, authenticated_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $sql->execute(array( $_POST["business_name"], $_POST["checkout_date"], $_POST["sellers_fee"], $_POST["ebt_match"], $_POST["ebt_tokens"], $_POST["mm_tokens"], $_POST["mm_vouchers"], $_POST["fmnp_fvc"],
                            $_POST["open_door"], $_POST["piersons_amount"], $_POST["comment"], $_POST["atm_tokens"], $_POST["wic_input_checkout"], $_POST["fmnp"], $_POST["fvc"], $_POST["market_bucks"], $_POST['market_id'], $_POST['vendor_type'],
                           $_POST["total_owed"], $_POST["checkout_market_name"], $_POST["custom_owed"], $_POST["authenticated_user"]));
  } else {

      $sql = $db->prepare('UPDATE checkout SET ebt_match = ?, ebt_tokens = ?, mm_tokens = ?, mm_vouchers = ?, fmnp_fvc = ?, open_door = ?, piersons_amount = ?,
        atm_tokens = ?, wic_input_checkout = ?, fmnp = ?, fvc = ?, market_bucks = ?, custom_fee = ?, total_owed = ? WHERE id = ?');
      $sql->execute(array( $_POST["ebt_match"], $_POST["ebt_tokens"], $_POST["mm_tokens"], $_POST["mm_vouchers"], $_POST["fmnp_fvc"],
                            $_POST["open_door"], $_POST["piersons_amount"], $_POST["atm_tokens"], $_POST["wic_input_checkout"], $_POST["fmnp"], $_POST["fvc"], $_POST["market_bucks"], $_POST["custom_owed"], $_POST["total_owed"], $checkout_row_id));


  };







?>
