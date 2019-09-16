<?php

require_once '../config/config.php';


$sql = $db->prepare('INSERT INTO checked_out_market (market_id, checkout_date, vendors_out, gross, atm_in, wic_in, fmnp_in, fvc_in, atm_out, ebt_out,
                                                      market_fees, cert_total, total_ag, total_ag_fee, total_non_ag, total_non_ag_fee, ebt_tokens_in,
                                                      ebt_match_in, ebt_total_in, ebt_match_out, expenses, market_notes, authenticated_user)
                                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

$sql->execute(array( $_POST["market_id"], $_POST["checkout_date"], $_POST["vendors_out"], $_POST["gross"], $_POST["atm_in"], $_POST["wic_in"], $_POST["fmnp_in"],
                      $_POST["fvc_in"], $_POST["atm_out"], $_POST["ebt_out"], $_POST["market_fees"], $_POST["cert_total"], $_POST["total_ag"],
                        $_POST["total_ag_fee"], $_POST["total_non_ag"], $_POST["total_non_ag_fee"], $_POST["ebt_tokens_in"], $_POST["ebt_match_in"],
                           $_POST['ebt_total_in'], $_POST["ebt_match_out"], $_POST["expenses"], $_POST["market_notes"], $authenticated_user));








?>
