<?php
require_once '../config/config.php';
include_once 'includes/header.php';

$week = $_POST['week'];
//$market = $_POST['market'];
$date = $_POST['checkout_date'];
$month = $_POST['month_choice'];
$quarter = $_POST['quarter'];
$vendor_name = $_POST['vendor_name'];
$state_bin = $_POST['state_bin'];
$authenticated_user = $_POST['authenticated_user'];

$market = explode('-', $_POST['market']);
$market[0];
$market[1];

$q_array = $db->prepare("SELECT * FROM market_currency WHERE user_id = ? ");
$q_array->execute(array($authenticated_user));
$currency_names = [];
$currency_values = [];
while ( $result = $q_array->fetch()){
  array_push($currency_names, $result['market_currency_name']);
}


$conditionals = [];

if (isset($quarter)) {
  switch ($quarter) {
    case '1':
      array_push($conditionals, "checkout_date >= date('2018-01-01') AND checkout_date <= ('2018-03-31')");
      break;
    case '2':
      array_push($conditionals, "checkout_date >= date('2018-04-01') AND checkout_date <= ('2018-06-30')");
      break;
    case '3':
      array_push($conditionals, "checkout_date >= date('2018-07-01') AND checkout_date <= ('2018-09-30')");
      break;
    case '4':
      array_push($conditionals, "checkout_date >= date('2018-10-01') AND checkout_date <= ('2018-12-31')");
      break;
  }
}

if (isset($month)) {
  switch ($month) {
    case '1':
      array_push($conditionals, "checkout_date >= date('2018-01-01') AND checkout_date <= ('2018-01-31')");
      break;
    case '2':
      array_push($conditionals, "checkout_date >= date('2018-02-01') AND checkout_date <= ('2018-02-28')");
      break;
    case '3':
      array_push($conditionals, "checkout_date >= date('2018-03-01') AND checkout_date <= ('2018-03-31')");
      break;
    case '4':
      array_push($conditionals, "checkout_date >= date('2018-04-01') AND checkout_date <= ('2018-04-30')");
      break;
    case '5':
      array_push($conditionals, "checkout_date >= date('2018-05-01') AND checkout_date <= ('2018-05-31')");
      break;
    case '6':
      array_push($conditionals, "checkout_date >= date('2018-06-01') AND checkout_date <= ('2018-06-30')");
      break;
    case '7':
      array_push($conditionals, "checkout_date >= date('2018-07-01') AND checkout_date <= ('2018-07-31')");
      break;
    case '8':
      array_push($conditionals, "checkout_date >= date('2018-08-01') AND checkout_date <= ('2018-08-31')");
      break;
    case '9':
      array_push($conditionals, "checkout_date >= date('2018-09-01') AND checkout_date <= ('2018-09-31')");
      break;
    case '10':
      array_push($conditionals, "checkout_date >= date('2018-10-01') AND checkout_date <= ('2018-10-31')");
      break;
    case '11':
      array_push($conditionals, "checkout_date >= date('2018-11-01') AND checkout_date <= ('2018-11-30')");
      break;
    case '12':
      array_push($conditionals, "checkout_date >= date('2018-12-01') AND checkout_date <= ('2018-12-31')");
      break;
  }
}

if (!empty($authenticated_user)) array_push($conditionals, "authenticated_user = '$authenticated_user'");
if (!empty($week)) array_push($conditionals, "week = '$week'");
if (!empty($market[1])) array_push($conditionals, "checkout_market_name = '$market[1]'");
if (!empty($date)) array_push($conditionals, "checkout_date = '$date'");
if (!empty($vendor_name)) array_push($conditionals, "business_name = '$vendor_name'");
//if (!empty($state_bin)) array_push($conditionals, "vendors.business_name = checkout.business_name");

//$query_str = 'SELECT * FROM checkout ';
if ($state_bin == NULL) {
  $query_str = 'SELECT * FROM checkout';

  if (count($conditionals) != 0) $query_str .= ' WHERE '.implode(' AND ', $conditionals).'';

  $sql = $query_str;
  $sql = $db->query($sql);

} else {

  $query_str = "SELECT checkout.`business_name`, checkout.`checkout_date`, checkout.`vendor_type`, vendors.`issuing_county`, vendors.`certificate_number`
                  FROM checkout, vendors WHERE vendors.`business_name` = checkout.`business_name` /*AND authenticated_user = $authenticated_user*/ ";

  //if (count($conditionals) != 0) $query_str .= ' WHERE'.implode(' AND ', $conditionals).'';

  //Quarterly Report
  $state_report = $db->prepare($query_str);
  $state_report->execute();
  $state_report->fetch();

  $type_array = [];
  while ( $result = $state_report->fetch()){
    array_push($type_array, [
      // 'Market Name' => $result['checkout_market_name'],
      'Business Name' => $result['business_name'],
      'Certificate Number' => $result['certificate_number'],
      'Issuing County' => $result['issuing_county'],
      'Date' => $result['checkout_date'],
      'Type' => $result['vendor_type']
      ]);
  }
}



$filter_cert = array("certified");
foreach($type_array as $arr)
{
    foreach($filter_cert as $value)
    {
        if(in_array($value,$arr))
        {
            $final_cert[]=$arr;
        }
    }
}
$final_cert_new = [];
foreach($final_cert as $cert)
{
    $business_name = $cert['Business Name'];

    $existing = $final_cert_new[$business_name];

    if ($existing == NULL) {
      $cert['Count'] = 1;
      $existing = $cert;
    } else {
      $existing['Date'] .= ', '.$cert['Date'];
      $existing['Count'] += 1;
    }

    $final_cert_new[$business_name] = $existing;

}


$count_cert = 0;
foreach($final_cert_new as $i) {
  $count_cert += $i['Count'];
}


/////////////////////BREAK///////////////////////////////
//
$filter_non_cert = array("noncertified");
foreach($type_array as $arr)
{
    foreach($filter_non_cert as $value)
    {
        if(in_array($value,$arr))
        {
            $final_non_cert[]=$arr;
        }
    }
}
$final_non_new = [];
foreach($final_non_cert as $non)
{
    $business_name = $non['Business Name'];

    $existing = $final_non_new[$business_name];

    if ($existing == NULL) {
      $non['Count'] = 1;
      $existing = $non;
    } else {
      $existing['Date'] .= ', '.$non['Date'];
      $existing['Count'] += 1;
    }

    $final_non_new[$business_name] = $existing;
}

$count_non = 0;
foreach($final_non_new as $i) {
  $count_non += $i['Count'];
}
//
// /////////////////////BREAK///////////////////////////////
//

$filter_anc = array("ancillary");
foreach($type_array as $arr)
{
    foreach($filter_anc as $value)
    {
        if(in_array($value,$arr))
        {
            $final_anc[]=$arr;
        }
    }
}
$final_anc_new = [];
foreach($final_anc as $non)
{
    $business_name = $non['Business Name'];

    $existing = $final_anc_new[$business_name];

    if ($existing == NULL) {
      $non['Count'] = 1;
      $existing = $non;
    } else {
      $existing['Date'] .= ', '.$non['Date'];
      $existing['Count'] += 1;
    }

    $final_anc_new[$business_name] = $existing;
}

$count_anc = 0;
foreach($final_anc_new as $i) {
  $count_anc += $i['Count'];
}


$state_noncertified = $db->prepare($query_str);
$state_noncertified->execute();

$state_ancillary = $db->prepare($query_str);
$state_ancillary->execute();

//Table 3
$q2 = $db->prepare($query_str);
$q2->execute();

?>

<!-- Single Report -->
<div class="row">
<div class="col-md-1">
 </div>
 <div class="col-md-10" id="single_report_table">
   <label class="col-sm-10 control-label">Single Report</label>
 <table class="table table-striped table-bordered table-condensed" id="single_report_table_export">
   <thead>
 <tr>
         <th> Market Name </th>
         <th> Business Name </th>
         <th> Date </th>
         <th> Vendor Type </th>
   <?php if (in_array('market_fee', $currency_names)) {?>
         <th> Market Fee </th>
         <th> Paid </th>
   <?php } if (in_array('comment', $currency_names)) {?>
         <th>Comment </th>
    <?php } if (in_array('revenue', $currency_names)) {?>
         <th>Revenue </th>
   <?php } if (in_array('EBT Tokens', $currency_names)) {?>
         <th>EBT Tokens </th>
   <?php } if (in_array('EBT Match', $currency_names)) { ?>
        <th> EBT Match Tokens </th>
   <?php } if (in_array('MM Tokens', $currency_names)) { ?>
         <th> MM Tokens </th>
   <?php } if (in_array('MM Vouchers', $currency_names)) { ?>
         <th> MM Vouchers </th>
   <?php } if (in_array('FMNP FVC', $currency_names)) {?>
         <th> FMNP FVC </th>
   <?php } if (in_array('Open Door', $currency_names)) { ?>
         <th> Open Door </th>
   <?php } if (in_array('Piersons', $currency_names)) { ?>
         <th> Piersons </th>
   <?php } if (in_array('ATM', $currency_names)) { ?>
         <th> ATM </th>
   <?php } if (in_array('cambria', $currency_names)) { ?>
         <th> Total Owed </th>
   <?php } ?>
 </tr>

</thead>
<?php

foreach($sql as $row) {

  $custom_fee_total += $row['custom_fee'];
  $total_owed_total += $row['total_owed'];
  $ebt_tokens_total += $row['ebt_tokens'];
  $ebt_match_total += $row['ebt_match'];
  $mm_tokens_total += $row['mm_tokens'];
  $mm_vouchers_total += $row['mm_vouchers'];
  $fmnp_fvc_total += $row['fmnp_fvc'];
  $open_door_total += $row['open_door'];
  $piersons_amount_total += $row['piersons_amount'];
  $atm_tokens_total += $row['atm_tokens'];

  echo '<tbody><tr>
        <td>'.$row['checkout_market_name'].'</td>
        <td>'.$row['business_name'].'</td>
        <td>'.$row['checkout_date'].'</td>
        <td>'.$row['vendor_type'].'</td>
  '; if (in_array('custom_fee', $currency_names)) {
      echo  '<td>$ ' . $row['custom_fee'] . '</td>
  ';} if (in_array('total_owed', $currency_names)) {
      echo '<td>$ ' . $row['total_owed'] . '</td>
  ';} if (in_array('comment', $currency_names)) {
      echo '<td>' . $row['comment'] . '</td>
  ';} if (in_array('EBT Tokens', $currency_names)) {
      echo'<td >$' . $row['ebt_tokens'] . '</td>
  ';} if (in_array('EBT Match', $currency_names)) {
      echo'<td>$' . $row['ebt_match'] . '</td>
  ';} if (in_array('MM Tokens', $currency_names)) {
      echo'<td>$' . $row['mm_tokens'] . '</td>
  ';} if (in_array('MM Vouchers', $currency_names)) {
      echo'<td>$ ' . $row['mm_vouchers'] . '</td>
  ';} if (in_array('FMNP FVC', $currency_names)) {
      echo'<td>$ ' . $row['fmnp_fvc'] . '</td>
  ';} if (in_array('Open Door', $currency_names)) {
      echo'<td>$ ' . $row['open_door'] . '</td>
  ';} if (in_array('Piersons', $currency_names)) {
      echo'<td>$ ' . $row['piersons_amount'] . '</td>
  ';} if (in_array('ATM', $currency_names)) {
      echo '<td>$' . $row['atm_tokens'] . '</td>
  ';} if (in_array('cambria', $currency_names)) {
      echo '<td>$' . $row['total_owed'] . '</td>
  ';}
      '</tr></tbody>';

}
?>
  <tfoot>
    <tr style="font-weight:bold;">
      <td >Total</td>
      <td></td>
      <td></td>
      <td></td>
    <?php if (in_array('custom_fee', $currency_names)) { ?>
      <td>$<?= $custom_fee_total ?></td>
    <?php } if (in_array('total_owed', $currency_names)) { ?>
      <td>$<?= $total_owed_total ?></td>
    <?php } if (in_array('comment', $currency_names)) { ?>
      <td></td>
    <?php } if (in_array('EBT Tokens', $currency_names)) { ?>
      <td>$<?= $ebt_tokens_total?></td>
    <?php } if (in_array('EBT Match', $currency_names)) { ?>
      <td>$<?= $ebt_match_total ?></td>
    <?php } if (in_array('MM Tokens', $currency_names)) { ?>
      <td>$<?= $mm_tokens_total ?></td>
    <?php } if (in_array('MM Vouchers', $currency_names)) { ?>
      <td>$<?= $mm_vouchers_total ?></td>
    <?php } if (in_array('FMNP FVC', $currency_names)) { ?>
      <td>$<?= $fmnp_fvc_total ?></td>
    <?php } if (in_array('Open Door', $currency_names)) { ?>
      <td>$<?= $open_door_total ?></td>
    <?php } if (in_array('Piersons', $currency_names)) { ?>
      <td>$<?= $piersons_amount_total ?></td>
    <?php } if (in_array('ATM', $currency_names)) { ?>
      <td>$<?= $atm_tokens_total ?></td>
    <?php } if (in_array('cambria', $currency_names)) { ?>
      <td>$<?= $total_owed_total ?></td>
    <?php } ?>
    </tr>
  </tfoot>
 </table>

 <br><hr><br>
 </div>
 <div class="col-md-1">
 </div>
 </div>
 <!-- End Single Report -->


 <!-- State Report -->
 <div id="state_report_table">
   <center><label class="">State Report</label></center>
   <hr>
   <center><label class="">Certified</label></center>
   <div class="row">
   <div class="col-md-1">
    </div>
    <div class="col-md-10">
     <table class="table table-striped table-bordered table-condensed" id="certified_table">
       <thead>
         <tr>
           <th><?php echo implode('</th><th>', array_keys(current($final_cert_new)))?></th>
         </tr>
       </thead>
       <tbody>
 <?php
 foreach ($final_cert_new as $row) {
   $total += $row['count'];
    ?>
           <tr class="certified" id="certified">
             <td><?php echo implode('</td><td class="rowDataSd">', $row); ?></td>
           </tr>
 <?php }; ?>
 <tr class="totalColumn">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="totalCol">Total: <?=$count_cert?> </td>
</tr>

         </tbody>
       </table>
       </div>
    <div class="col-md-1">
    </div>
    </div>
    <br>
    <center><label class="">Non Certified</label></center>
    <br>

  <div class="row">
  <div class="col-md-1">
   </div>
   <div class="col-md-10">
    <table class="table table-striped table-bordered table-condensed">
      <thead>
        <tr>
          <th><?php echo implode('</th><th>', array_keys(current($final_non_new))); ?></th>
        </tr>
      </thead>
      <tbody>
<?php foreach ($final_non_new as $row) { ?>
          <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
          </tr>
<?php } ?>
<tr class="totalColumn">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="totalCol">Total: <?=$count_non?> </td>
</tr>
        </tbody>
      </table>
    </div>
   <div class="col-md-1">
   </div>
   </div>
   <br>
   <center><label class="">Ancillary </label></center>
   <br>

  <div class="row">
   <div class="col-md-1">
    </div>
    <div class="col-md-10">
      <table class="table table-striped table-bordered table-condensed">
        <thead>
          <tr>
            <th><?php echo implode('</th><th>', array_keys(current($final_anc_new))); ?></th>
          </tr>
        </thead>
        <tbody>
 <?php foreach ($final_anc_new as $row) { ?>
          <tr>
            <td><?php echo implode('</td><td>', $row); ?></td>
          </tr>
 <?php } ?>
 <tr class="totalColumn">
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="totalCol">Total: <?=$count_anc?> </td>
</tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-1">
    </div>
    </div>
  </div>
  <!-- End State Report -->




   <!-- Vendor Report -->
   <div class="row">
   <div class="col-md-1">
    </div>
    <div class="col-md-10" id="choose_vendor_table">
      <label class="col-sm-10 control-label">Vendor Report</label>
    <table class="table table-striped table-bordered table-condensed" id="vendor_report_table_export">
      <thead>
    <tr>
      <th> Vendor</th>
      <th> Date</th>
      <th> Markets </th>
      <?php if (in_array('market_fee', $currency_names)) {?>
            <th> Market Fee </th>
            <th> Paid </th>
      <?php } if (in_array('comment', $currency_names)) {?>
            <th>Comment </th>
       <?php } if (in_array('revenue', $currency_names)) {?>
            <th>Revenue </th>
      <?php } if (in_array('EBT Tokens', $currency_names)) {?>
            <th>EBT Tokens </th>
      <?php } if (in_array('EBT Match', $currency_names)) { ?>
           <th> EBT Match Tokens </th>
      <?php } if (in_array('MM Tokens', $currency_names)) { ?>
            <th> MM Tokens </th>
      <?php } if (in_array('MM Vouchers', $currency_names)) { ?>
            <th> MM Vouchers </th>
      <?php } if (in_array('FMNP FVC', $currency_names)) {?>
            <th> FMNP FVC </th>
      <?php } if (in_array('Open Door', $currency_names)) { ?>
            <th> Open Door </th>
      <?php } if (in_array('Piersons', $currency_names)) { ?>
            <th> Piersons </th>
      <?php } if (in_array('ATM', $currency_names)) { ?>
            <th> ATM </th>
      <?php } if (in_array('cambria', $currency_names)) { ?>
            <th> Total Owed </th>
      <?php } ?>
    </tr>
   </thead>
   <?php
   while($row = $q2->fetch()) {
     echo '<tr><td>' . $row['business_name'] . '</td>
     <td>' . $row['checkout_date'] . '</td>
     <td>' . $row['checkout_market_name'] . '</td>
     '; if (in_array('custom_fee', $currency_names)) {
         echo  '<td>$ ' . $row['custom_fee'] . '</td>
     ';} if (in_array('total_owed', $currency_names)) {
         echo '<td>$ ' . $row['total_owed'] . '</td>
     ';} if (in_array('comment', $currency_names)) {
         echo '<td>' . $row['comment'] . '</td>
     ';} if (in_array('EBT Tokens', $currency_names)) {
         echo'<td >$' . $row['ebt_tokens'] . '</td>
     ';} if (in_array('EBT Match', $currency_names)) {
         echo'<td>$' . $row['ebt_match'] . '</td>
     ';} if (in_array('MM Tokens', $currency_names)) {
         echo'<td>$' . $row['mm_tokens'] . '</td>
     ';} if (in_array('MM Vouchers', $currency_names)) {
         echo'<td>$ ' . $row['mm_vouchers'] . '</td>
     ';} if (in_array('FMNP FVC', $currency_names)) {
         echo'<td>$ ' . $row['fmnp_fvc'] . '</td>
     ';} if (in_array('Open Door', $currency_names)) {
         echo'<td>$ ' . $row['open_door'] . '</td>
     ';} if (in_array('Piersons', $currency_names)) {
         echo'<td>$ ' . $row['piersons_amount'] . '</td>
     ';} if (in_array('ATM', $currency_names)) {
         echo '<td>$' . $row['atm_tokens'] . '</td>
     ';} if (in_array('cambria', $currency_names)) {
         echo '<td>$' . $row['total_owed'] . '</td>
     ';}'
     </tr>';
   }
   ?>
    </table>
    </div>
    <div class="col-md-1">
    </div>
    </div>
    <!-- End Vendor Report -->


    <!-- ecology Report -->
    <div class="row">
    <div class="col-md-1">
     </div>
     <div class="col-md-10" id="ecology_table">
       <label class="col-sm-10 control-label">Ecology Report</label>
     <table class="table table-striped table-bordered table-condensed" id="ecology_table_export">
         <tr>
           <th> Market Date</th>
           <th> Market Name</th>
           <th> Total Market Match NEW </th>
           <th> Total Market Match Repeat  </th>
           <th> Total Market Match CalFresh </th>
           <th> Total CalFresh Distributed </th>
           <th> Total CalFresh Redeemed</th>
           <th> Outstanding CF </th>
           <th> Total Incentives Distributed </th>
           <th> Outstand MM </th>
         </tr>

      <tr>
        <th> 1/1/2016</th>
        <th> Demo Market</th>
        <th> 13</th>
        <th> 10</th>
        <th> $106.00</th>
        <th> $110.00</th>
        <th> $-4.00</th>
        <th> $130.00</th>
        <th> $115.00</th>
        <th> $15.00</th>
      </tr>

      <tr>
        <th> 1/8/2016</th>
        <th> Demo Market 2</th>
        <th> 6</th>
        <th> 99</th>
        <th> $87.00</th>
        <th> $101.00</th>
        <th> $-14.00</th>
        <th> $160.00</th>
        <th> $159.00</th>
        <th> $1.00</th>
      </tr>

      <tr>
        <th> 1/10/2016</th>
        <th> Demo Market 2</th>
        <th> 8</th>
        <th> 4</th>
        <th> $97.00</th>
        <th> $81.00</th>
        <th> $16.00</th>
        <th> $220.00</th>
        <th> $215.00</th>
        <th> $5.00</th>
      </tr>

      <tr>
        <th> 1/12/2016</th>
        <th> Demo Market 3</th>
        <th> 9</th>
        <th> 7</th>
        <th> $135.00</th>
        <th> $90.00</th>
        <th> $45.00</th>
        <th> $150.00</th>
        <th> $155.00</th>
        <th> $5.00</th>
      </tr>

      <tr>
        <th> 1/14/2016</th>
        <th> Demo Market 4</th>
        <th> 10</th>
        <th> 7</th>
        <th> $245.00</th>
        <th> $230.00</th>
        <th> $15.00</th>
        <th> $145.00</th>
        <th> $144.00</th>
        <th> $1.00</th>
      </tr>

      <tfoot>
      <tr>
        <th> Monthly Market Totals</th>
        <th> </th>
        <th> 46</th>
        <th> $127.00</th>
        <th> $670.00</th>
        <th> $73.00</th>
        <th> $58.00</th>
        <th> $805.00</th>
        <th> $788.00</th>
        <th> $27.00</th>
      </tr>
    </tfoot>
     </table>
     </div>


  <script>



  $("#dates_participated").keyup(function(){
  var value = $(this).val().replace(" ", "");
  var words = value.split(",");
  var wordcount =  words.length;
  document.getElementById("total").value = wordcount;
  });






    </script>
