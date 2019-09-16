<?php
require_once '../config/config.php';

$date = $_POST['date'];
$market_id = $_POST['market_id'];






$q2 = $db->prepare("SELECT SUM(CASE WHEN ch.vendor_type = 'certified' THEN 1 ELSE 0 END) AS certified,
       SUM(CASE WHEN ch.vendor_type = 'noncertified' THEN 1 ELSE 0 END) AS noncertified,
       SUM(CASE WHEN ch.vendor_type='ancillary' THEN 1 ELSE 0 END) AS ancillary
  FROM checkout ch WHERE checkout_date = ? AND market_id = ? ");
$q2->execute(array($date, $market_id));
$vendor_type_count = $q2->fetch();

$certified = $vendor_type_count['certified'];
$noncertified = $vendor_type_count['noncertified'];
$cert_total = $noncertified + $certified;
$ancillary = $vendor_type_count['ancillary'];


$q3 = $db->prepare("SELECT SUM(custom_fee) AS total_ag FROM checkout WHERE `market_id` = ? AND checkout_date = ? AND `vendor_type` = 'certified' OR `vendor_type` = 'noncertified'  ");
$q3->execute(array($market_id, $date));
$ag_count = $q3->fetch();

$ag_fees = $ag_count['total_ag'];

$q4 = $db->prepare("SELECT SUM(custom_fee) AS ancillary FROM checkout WHERE `market_id` = ? AND checkout_date = ? AND `vendor_type` = 'ancillary' ");
$q4->execute(array($market_id, $date));
$ancillary_count = $q4->fetch();

$ancillary_fees = $ancillary_count['ancillary'];


//EBT Match
$q5 = $db->prepare("SELECT SUM(ebt_match) AS ebt_match_sum FROM checkout WHERE `market_id` = ? AND checkout_date = ? ");
$q5->execute(array($market_id, $date));
$ebt_match_in = $q5->fetch();
$ebt_match_in = $ebt_match_in['ebt_match_sum'];

//ATM Tokens
$q6 = $db->prepare("SELECT SUM(atm_tokens) AS atm_sum FROM checkout WHERE market_id = ? AND checkout_date = ? ");
$q6->execute(array($market_id, $date));
$atm_sum_in = $q6->fetch();
$atm_in = $atm_sum_in['atm_sum'];

//EBT Tokens
$q7 = $db->prepare("SELECT SUM(ebt_tokens) AS ebt_tokens FROM checkout WHERE market_id = ? AND checkout_date = ? ");
$q7->execute(array($market_id, $date));
$ebt_tokens_sum_in = $q7->fetch();
$ebt_tokens_sum = $ebt_tokens_sum_in['ebt_tokens'];

//WIC Tokens
$q8 = $db->prepare("SELECT SUM(wic_input_checkout) AS wic_tokens FROM checkout WHERE market_id = ? AND checkout_date = ? ");
$q8->execute(array($market_id, $date));
$wic_tokens_sum_in = $q8->fetch();
$wic_in = $wic_tokens_sum_in['wic_tokens'];

//FMNP Tokens
$q9 = $db->prepare("SELECT SUM(fmnp) AS fmnp_tokens FROM checkout WHERE market_id = ? AND checkout_date = ? ");
$q9->execute(array($market_id, $date));
$fmnp_tokens_sum = $q9->fetch();
$fmnp_in = $fmnp_tokens_sum['fmnp_tokens'];

//FVC Tokens
$q10 = $db->prepare("SELECT SUM(fvc) AS fvc_tokens FROM checkout WHERE market_id = ? AND checkout_date = ? ");
$q10->execute(array($market_id, $date));
$fvc_tokens_sum = $q10->fetch();
$fvc_in = $fvc_tokens_sum['fvc_tokens'];

//Market Match
$q11 = $db->prepare("SELECT SUM(wic_amount) AS wic, SUM(mm_amount) AS mm FROM wic WHERE market_id = ? AND checkout_date = ? ");
$q11->execute(array($market_id, $date));
$mm_q = $q11->fetch();
$mm_out = $mm_q['mm'];
$wic_out = $mm_q['wic'];

//Market Match Number of transactions
$q12 = $db->prepare("SELECT COUNT(*) AS total FROM wic WHERE checkout_date = ? AND market_id = ? ");
$q12->execute(array($date, $market_id));
$trans = $q12->fetch();
$trans_total = $trans['total'];

//////////////////////Displays or Hides Market Bucks Field /////////////////////////
$q2 = $db->prepare("SELECT * FROM market_currency WHERE market_public_id = ? ");
$q2->execute(array($market_id));
$currency_names = [];
$currency_values = [];
while ( $result = $q2->fetch()){
  array_push($currency_names, $result['market_currency_name']);
  array_push($currency_values, $result['market_currency_value']);
}

?>

  <div class="col-md-12">
    <div class="well filter-form">
      <div class="row">
         <form  id="checkout_market" class="" role="form" method="post" action="">
          <div class="col-md-6">
            <input name="market_id" value="<?= $market_id?>"  style="display:none;">
             <input name="checkout_date" value="<?= $date?>"  style="display:none;">
               <div class="form-group">
                  <label for="vendors_out"># Vendors Checked Out</label>
                  <input name="vendors_out" type="number" readonly value="<?= $total_vendors ?>" placeholder=" <?= $total_vendors ?>" class="form-control" >
                </div>
               <div class="form-group">
                  <label for="gross"># Gross</label>
                  <input name="gross" readonly value="$<?= $total_paid ?>" class="form-control">
              </div>
        <?php if (in_array('market_fees', $currency_names)) {?>
                <div class="form-group">
                     <label for="market_fees">Market Fees</label>
                       <div class="col-sm-12">
                         <div class="col-sm-12 input-group">
                          <span class="input-group-addon">$</span>
                          <input name="market_fees" type="number" readonly value="<?php echo $total_owed_gross ?>"  class="form-control" id="market_fees">
                        </div>
                   </div>
                </div>
                <div class="form-group">
                   <label for="cert_total">Cert Total</label>
                   <input name="cert_total" type="number" readonly value="" placeholder=" $ Cert Total" class="form-control" id="cert_total">
                </div>
        <?php } if (in_array('ncga', $currency_names)) {?>
                <div class="form-group">
                  <div class="row">
                    <div class="col-xs-6">
                       <label for="cert_number">Total Ag</label>
                       <input name="total_ag" readonly value="<?= $cert_total ?>" class="form-control">
                    </div>
                    <div class="col-xs-6">
                        <label for="cert_number">Total Ag Fee</label>
                       <input name="total_ag_fee" type="cert_number" readonly value="$<?= $ag_fees ?>" class="form-control">
                    </div>
                  </div>
                 </div>
                 <div class="form-group">
                   <div class="row">
                     <div class="col-xs-6">
                        <label for="cert_number">Total Non Ag</label>
                        <input name="total_non_ag" readonly value="<?= $ancillary ?>" class="form-control">
                     </div>
                     <div class="col-xs-6">
                         <label for="cert_number">Total Non Ag Fee</label>
                        <input name="total_non_ag_fee" type="cert_number" readonly value="$<?= $ancillary_fees ?>" class="form-control">
                     </div>
                   </div>
                  </div>

              <?php } if (in_array('EBT Match', $currency_names)) {?>
                  <div class="form-group">
                     <label for="ebt_match_in">EBT Match In</label>
                      <input readonly name="ebt_match_in" value="$<?= $ebt_match_in ?>" class="form-control">
                  </div>
              <?php } if (in_array('ATM', $currency_names)) {?>
                  <div class="form-group">
                     <label for="atm_in">ATM In</label>
                      <input readonly name="atm_in" value="$<?= $atm_in ?>" class="form-control">
                    </div>
              <?php } if (in_array('wic_input_checkout', $currency_names)) {?>
                  <div class="form-group">
                     <label>WIC In</label>
                      <input readonly name="wic_in" value="$<?= $wic_in ?>" class="form-control">
                  </div>
              <?php } if (in_array('fmnp_end_of_market', $currency_names)) {?>
                  <div class="form-group">
                     <label>FMNP In</label>
                      <input readonly name="fmnp_in" value="$<?= $fmnp_in ?>" class="form-control">
                  </div>
              <?php } if (in_array('fvc_end_of_market', $currency_names)) {?>
                  <div class="form-group">
                     <label >FVC In</label>
                      <input readonly name="fvc_in" value="$<?= $fvc_in ?>" class="form-control">
                  </div>
                <?php } if (in_array('end_of_market_cambria', $currency_names)) {?>
                    <div class="form-group">
                      <label>ATM Out</label>
                      <input  name="atm_out" value="" placeholder="Enter Total ATM Out" class="form-control" >
                    </div>
              <?php }; ?>
             </div>

           <div class="col-md-6">
           <?php if (in_array('end_of_market', $currency_names)) {?>
               <div class="form-group">
                 <label>EBT Tokens in</label>
                 <input readonly name="ebt_total_in" value="$<?= $ebt_tokens_sum?>" class="form-control" >
               </div>
           <?php } if (in_array('end_of_market_cambria', $currency_names)) {?>
             <div class="form-group">
               <label>EBT Out</label>
               <input  id="ebt_out" name="ebt_out" value="$ <?= $wic_out ?>" placeholder="Enter Total EBT Out" class="form-control" readonly>
             </div>
             <div class="form-group">
                <label for="atm_in">Market Match Out</label>
                 <input readonly name="mm_out" value="$<?= $mm_out ?>" class="form-control">
               </div>
           <div class="form-group">
              <label>Total Ebt Transactions</label>
               <input readonly name="total_ebt_transactions" value="<?= $trans_total ?>" class="form-control">
             </div>
             <div class="form-group">
               <label>Expenses</label>
               <input  name="expenses" value="" placeholder="Enter Expenses for Market" class="form-control" >
             </div>

            <div class="form-group">
                   <label for="market_notes">Markets Notes</label>
                   <textarea class="form-control" id="market_notes"name="market_notes" rows="5" cols="45" placeholder="Enter Notes Here"></textarea>
            </div>
        <?php  } ?>
        </div>
      </div>
          </form>

      <!-- <div class="row">
        <div class="col-md-12">
          <center><button onclick='checkout()' class="btn btn-success" >Check out Market<span class="glyphicon glyphicon-check"></span></button></center>
        </div>
      </div> -->
      </div>


    <!-- Modal -->
    <div class="modal fade" id="checkoutmarketl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">End of Day</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                   <label for="expenses">Expenses</label>
                   <input type="number" readonly name="expenses" value="" placeholder=" expenses" class="form-control" id="expenses">
            </div>
            <div class="form-group">
                   <label for="ebt_out">EBT Out</label>
                   <input type="number" readonly name="ebt_out" value="" placeholder=" ebt_out In" class="form-control" id="ebt_out">
            </div>

            <div class="form-group">
                   <label for="ebt_match_out">EBT Out</label>
                   <input type="number" readonly name="ebt_match_out" value="" placeholder=" ebt_match_out" class="form-control" id="ebt_match_out">
            </div>
            <div class="form-group">
                   <label for="atm_out">ATM Out</label>
                   <input type="number" readonly name="atm_out" value="" placeholder=" atm_out" class="form-control" id="atm_out">
            </div>
            <div class="form-group">
                   <label for="atm_fee">ATM Fees</label>
                   <input type="number" readonly name="atm_fee" value="" placeholder=" atm_fee" class="form-control" id="atm_fee">
            </div>
            <div class="form-group">
                <label for="notes">End of Day Notes</label>
                  <input type="text" name="notes" value="" placeholder="" class="form-control" required="required" readonly id="notes" >
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Check out Market</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->
  </div>
