<?php
session_start();
require_once './config/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$market_id = $_GET['market_id'];
$date = date('m/d/Y', time());



////////////////////////////////////Query for Market Info /////////////////
$q2 = $db->prepare("SELECT * FROM markets WHERE public_id = ? ");
$q2->execute(array($market_id));
$market_q = $q2->fetch();
      //Vars//
$id_market = $market_q['id'];
$img = $market_q['img_url'];
$flat = (double)$market_q['flat_fee'];
$percentage = (double)$market_q['percentage_fee'];
$week_day_num = $market_q['market_day'];
$if_flat = $market_q['flat_fee'];
$if_percentage = $market_q['percentage_fee'];
$if_custom = $market_q['custom_fee'];
////////////////////////////////////End Query for Market Info /////////////////

$disabled_vendors = $db->prepare("SELECT business_name FROM checkout WHERE checkout_date = ?  ");
$disabled_vendors->execute(array($date));

$greyed_vendor = [];
while ( $result = $disabled_vendors->fetch()){
  array_push($greyed_vendor, $result['business_name']);
}



if ($week_day_num == 'Sunday') {
  $week_day = '0';
} else if ($week_day_num == 'Monday') {
  $week_day = '1';
} else if ($week_day_num == 'Tuesday') {
  $week_day = '2';
} else if ($week_day_num == 'Wednesday') {
  $week_day = '3';
} else if ($week_day_num == 'Thursday') {
  $week_day = '4';
} else if ($week_day_num == 'Friday') {
  $week_day = '5';
} else if ($week_day_num == 'Saturday') {
  $week_day = '6';
}


$q6 = $db->prepare("SELECT * FROM users WHERE id = ? ");
$q6->execute(array($authenticated_user));
$user_query = $q6->fetch();
$admin_email = $user_query['email'];

/////////////////////// Display's fee in 'Seller's Fee' field ///////////////
$sql = $db->prepare("SELECT market_name, COALESCE (percentage_fee,flat_fee) AS VALUE FROM markets WHERE public_id = ? ");
$sql->execute(array($market_id));
$fee = $sql->fetch();
$m_name = $fee['market_name'];
/////////////////////// Display's fee in 'Seller's Fee' field End ///////////////

//////////////////////Displays or Hides Market Bucks Field /////////////////////////
$q2 = $db->prepare("SELECT * FROM market_currency  WHERE market_id = ? ");
$q2->execute(array($id_market));
$currency_names = [];
while ( $result = $q2->fetch()){
  array_push($currency_names, $result['market_currency_name']);
}

include_once 'includes/header.php';
?>

<link href="./css/checkout.css" rel="stylesheet" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97558181-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97558181-2');
</script>


<div id="page-wrapper">
    <div class="row">
      <div class="col-lg-6">
        <h1>Checkout <?php echo $fee['market_name'] ?></h1>
          <br>
            <div class='col-md-6'>
              <div class="input-group">
                <span class="input-group-btn">  <a data-toggle="modal" href="#dateModal" class="btn btn-primary">Change Date</a></span>
                <input id="checkout_date_4" class="form-control"  name="checkout_date" value="" type="text" readonly>
              </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div id="invoice-POS">
               <center id="top">
                 <div class="logo"><img width: "12" height: "12" src="img/<?php echo $img ?>"  alt="" title="" /></div>
                  <div class="info">
                    <h4><?php echo $fee['market_name'] ?></h4>
                  </div></center><!--End InvoiceTop-->
                   <div id="mid">
                     <div class="info">
                       <input id="checkout_date_3" type="text" readonly>
                     </div>
                   </div>
                     <div id="bot">
                           <div id="table">
                             <!-- Reciept -->
                             <table id="receipt">
                               <tr class="service">
                                 <td class="tableitem">Vendor: </td>
                                 <td class="tableitem" width="200"><div id="vendornameoutput"></div></td>
                               </tr>

                               <tr class="service">
                                 <td class="tableitem"><strong>EBT Token</strong></td>
                                 <td class="tableitem" width="200"><span id="ebt_tokens_receipt" style="color:grey;">$0.00</span></td>
                               </tr>
                            <?php if (in_array('EBT Match', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>EBT Match</strong></td>
                                  <td class="tableitem" width="200"><span id="ebt_match_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('market_bucks_morro_bay', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>Market Bucks </strong></td>
                                  <td class="tableitem" width="200"><span id="market_bucks_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('ATM', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>ATM Tokens</strong></td>
                                  <td class="tableitem" width="200"><span id="atm_tokens_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('wic_input_checkout', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>WIC</strong></td>
                                  <td class="tableitem" width="200"><span id="wic_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('fmnp', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>FMNP</strong></td>
                                  <td class="tableitem" width="200"><span id="fmnp_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('fvc', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>FVC </strong></td>
                                  <td class="tableitem" width="200"><span id="fvc_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('MM Tokens', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>MM Tokens </strong></td>
                                  <td class="tableitem" width="200"><span id="mm_tokens_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('MM Vouchers', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>MM Vouchers </strong></td>
                                  <td class="tableitem" width="200"><span id="mm_vouchers_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('FMNP FVC', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>FMNP FVC </strong></td>
                                  <td class="tableitem" width="200"><span id="fmnp_fvc_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('Open Door', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>Open Door </strong></td>
                                  <td class="tableitem" width="200"><span id="open_door_receipt" style="color:grey;">$0.00</span></td>
                                </tr>
                            <?php } if (in_array('Piersons', $currency_names)) { ?>
                                <tr class="service">
                                  <td class="tableitem"><strong>Piersons </strong></td>
                                  <td class="tableitem" width="200"><span id="piersons_receipt" style="color:grey;">$0.00</span></td>
                                </tr>

                                <tr class="service">
                                  <td class="tableitem"><strong>Comment </strong></td>
                                  <td class="tableitem" width="200"><span id="comment_receipt" style="color:grey;">Comments</span></td>
                                </tr>



                                  <?php } /* if (in_array('cambria', $currency_names)) { */?>
                                      <div class="form-group checkout_div_form">
                                        <label class=" checkout_div col-md-6 control-label">Owed</label>
                                         <div class="col-md-6">
                                           <div class="col-md-12 input-group">
                                           <span class="input-group-addon">$</span>
                                           <input id='total_owed' type="number"  class="form-control formBlock" name="total_owed"  placeholder="Owed to Market" readonly/>
                                         </div>
                                         </div>
                                      </div>
                                      <?php /* } else { */ ?>
                               <br>
                               <tr class="service">
                                 <td class="tableitem"><strong>Paid</strong></td>
                                 <td class="tableitem" width="200"><span id="paid" style="color:grey;">$0.00</span></td>
                               </tr>
                             </table>
                             <!-- Reciept -->
                           </div><!--End Table-->
                           <hr>
                           <div id="legalcopy">
                             <p class="legal"><strong>Thank you for your business!</strong></p>
                           </div>
                            <br><br>
                     </div><!--End InvoiceBot-->
                   </div><!--End Invoice-->
                  </div>
                </div>
              </div>
    </div>
    <br>

<div id="checkout_slides" class="carousel slide" data-ride="carousel">
    <nav class="navbar navbar-default nav_bar" role="navigation" id="scroll_nav">
                <div class=" navbar-static-top ">
                    <ol class="nav navbar-nav nav-indicators">
                        <li data-target="#checkout_slides" data-slide-to="0" class="checkout_slides-target inline disabled"><a href="#">At-Market</a></li>
                        <li data-target="#checkout_slides" data-slide-to="1" class="checkout_slides-target active inline"><a href="#">Checkout</a></li>
                        <li data-target="#checkout_slides" data-slide-to="2" class="checkout_slides-target inline"><a href="#">Checkout Table</a></li>
                        <li data-target="#checkout_slides" data-slide-to="3" class="checkout_slides-target inline"><a href="#">End of Market</a></li>
                        <li onclick="addnewvendor()" class="btn-success"><a href="#" ><span class="glyphicon glyphicon-plus"></span>Quick Add Vendor</a></li>

                    </ol>


                </div>
            </nav>

        <div class="carousel-inner" >
          <div class="alert alert-success" id="success-alert-vendor">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Success! </strong>
              Vendor has been saved!
          </div>

          <div class="alert alert-success" id="success-alert-email">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Success! </strong>
              Vendor has been emailed a reciept!
          </div>

          <div class="alert alert-danger" id="failed-alert-email">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Email Failed! </strong>
              Please check vendor email address under vendor profiles!
          </div>




          <div class="item" id="">
            <div class="well filter-form">
              <form action="" method="post" id='wic_form'>
                <input id="checkout_date_wic" name="checkout_date" value="" type="text" style="display:none;">
                  <input id="wic_edit_id" name="wic_edit_id" value="" style="display:none;" >
                <input name="market_id" value="<?= $market_id ?>"  id="market_id" class="form-control" style="display:none;">
                <div class="row">
                <div class="col-xs-4">
                  <div class="form-group">
                    <label class="col-sm-4 control-label"> First Name, Last 4 of EBT #</label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <input id='wic_number' type="text" pattern="\d*" class="form-control formBlock" name="wic_number"  placeholder="1111"  />
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"> EBT Amount</label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <span class="input-group-addon">$</span>
                        <input id='wic_amount' type="text" pattern="\d*" class="form-control formBlock" name="wic_amount"  placeholder="EBT Amount"  />
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Market Match Amount </label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <span class="input-group-addon">$</span>
                        <input id='mm_amount' type="text" pattern="\d*" class="form-control formBlock" name="mm_amount"  placeholder="Market Match Amount"  />
                      </div>
                    </div>
                  </div>
                  <br>
                  <br>
                  <div class="form-group" style="display:none;">
                    <div class="row>">
                    <div class="col-md-4">
                        <label class="radio-inline">
                            <input type="radio" name="customer_type" checked value="new" id="new"/> new
                        </label>
                      </div>
                      <div class="col-md-4">
                        <label class="radio-inline">
                            <input type="radio" name="customer_type" value="existing" id="existing"/> existing
                        </label>
                      </div>
                    </div>
                  </div>
                  <br>

                </div>
                </form>

                <div  class="row-xs-1">
                </div>

                <div class="col-xs-4">
                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Existing</label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <input id='wic_existing'  class="form-control formBlock" placeholder="WIC Existing" name="wic_existing" readonly />
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label class="col-sm-4 control-label"> New</label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <input id='wic_new'  class="form-control formBlock" name="wic_new"  placeholder="WIC New" readonly />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <input type="button" form="wic_form" class="btn btn-success " onclick='submitWic()' value='Save' id="submit" >
          <br><hr>

          <center> <h1><bold> Customer Transaction Log</bold></h1> </center>

          <table class="table table-striped table-bordered table-condensed checkout_table_width" >
            <colgroup>
             <col width="20%" />
             <col width="6%" />
             <col width="6%" />
             <col width="6%" />
             <col width="6%" />
           </colgroup>
            <thead>
              <tr>
                <th class="checkout_table">Customer </th>
                <th class="checkout_table">EBT Amount</th>
                <th class="checkout_table">Market Match Amount</th>
                <th class="checkout_table">Customer Type</th>
                <th>Actions</th>
              </tr>
            </thead>
          <tbody id="wic_tbl">
          </tbody>
        </table>
          </div>
          </div>

  <div class="item active" id="item_active">
    <center>
    <div class="well filter-form" id="scrollCheckout">
      <div class=" checkout" id="checkout">
           <div class="row" id="receipt_to_print">
             <div id="vendor_added"> </div>
             <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6">
               <form action="" method="post" id='newcheckout'>
                      <input name="checkout_market_name" value="<?php echo $fee['market_name'] ?>"  id="checkout_market_name" class="form-control"  type="text" placeholder="Checkout <?php echo $fee['market_name'] ?>" readonly style="display:none;">
                      <input name="market_id" value="<?= $market_id ?>"  id="market_id" class="form-control" style="display:none;">
                      <input id="checkout_date_2" name="checkout_date" value="" type="text" style="display:none;">
                      <input name="admin_email" value="<?= $admin_email ?>"  id="admin_email" class="form-control" style="display:none;">
                      <input name="img_url" value="<?php echo $img ?>"  id="img_url" class="form-control" style="display:none;">
                      <input id="checkout_row_id" name="checkout_row_id" value="" class="form-control" style="display:none;">
                      <input id="authenticated_user" name="authenticated_user" value="<?= $authenticated_user ?>" class="form-control" style="display:none;">
                      <input id="vendor_email" name="vendor_email" value="" style="display:none;">
                      <input id="vendor_type" name="vendor_type" value="" style="display:none;" >

                 <div class="form-group checkout_div_form">
                   <label class="col-sm-4 control-label">Vendor</label>

                   <div class="checkout_div_form" id="choose_vendor_list">
                     <div class="col-sm-4" id="select_vendor">
                     <select class="selectpicker" data-live-search="true" data-dropup-auto="false"  id='business_name_select' name="business_name" onchange="get_vendor_details(value);" style="width: 190px;" >
                     </select>
                   </div>
                      <hr style="height:-20px; visibility:hidden;" >
                  </div>
                   <br>
                    <?php if (isset($if_percentage)) { ?>
                    <div class="form-group checkout_div_form">
                      <label class="col-sm-4 control-label">Sales</label>
                      <div class="col-sm-4" style:"width 40%">
                        <div class="col-sm-12 input-group">
                          <span class="input-group-addon">$</span>
                          <input id='custom_owed' type="number" pattern="\d*" class="form-control formBlock " name="custom_owed"  placeholder="Total Sales" required/>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="form-group checkout_div_form">
                      <label class="col-sm-4 control-label">Market Fee</label>
                        <div class="col-sm-4" style:"width 40%">
                          <div class="col-sm-12 input-group">
                            <span class="input-group-addon">$</span>
                            <input id='fee' name="total" step="0.01" class="form-control" value="" placeholder="Enter Sales to see Fee" readonly/>
                          </div>
                        </div>
                      </div>
                  <br><br>
                  <br>
                <?php } else if (isset($if_custom)) { ?>
                  <!-- this amount is for is column customn is yes (North Coast) -->
                  <div class="form-group checkout_div_form">
                    <label class="col-sm-4 control-label"> Amount</label>
                    <div class="col-sm-4" style:"width 40%">
                      <div class="col-md-12 input-group">
                        <span class="input-group-addon">$</span>
                        <input id='custom_owed' type="number" pattern="\d*" class="form-control formBlock " name="custom_owed"  placeholder="Enter Owed Amount" />
                      </div>
                    </div>
                  </div>
                  <br><br>
                <?php } else if (isset($if_flat)) { ?>
            <div class="form-group">
              <label class="col-sm-4 control-label">Sellers Fee</label>
              <div class="col-md-3">
              <input id='market_fee' type="number" pattern="\d*" class="form-control" placeholder="<?php echo $fee['VALUE'] ?>" value="<?php echo $fee['VALUE'] ?>" readonly/>
            </div>
          </div>
          <br>
        <?php } if (in_array('EBT Tokens', $currency_names)) {?>
        </div>
        <div class="col-md-3">
        </div>
      </div>

<div class="row">
  <div class="col-xs-2">
  </div>
<div <?php echo in_array('col_xs_8', $currency_names) ? "class='col-xs-8' " : "class='col-xs-4' " ?>>
  <div class="form-group checkout_div_form">
    <label class=" checkout_div col-md-6 control-label">EBT Tokens</label>
      <div class="col-md-6">
          <input id='ebt_tokens' type="number" pattern="\d*" name="ebt_tokens" value="" placeholder="EBT Tokens" class="form-control token_input" >
        </div>
      </div>
      <br>
     <?php } if (in_array('EBT Match', $currency_names)) { ?>
    <div class="form-group checkout_div_form">
      <label class=" checkout_div col-md-6 control-label">EBT Match</label>
      <div class="col-md-6">
          <input id="ebt_match" type="number" pattern="\d*" name="ebt_match" value="" placeholder="EBT Match" class="form-control token_input" >
        </div>
      </div>
      <br>
    <?php } if (in_array('market_bucks_morro_bay', $currency_names)) { ?>
   <div class="form-group checkout_div_form">
     <label class=" checkout_div col-md-6 control-label">Market Bucks</label>
     <div class="col-md-6">
         <input id="market_bucks" type="number" pattern="\d*" name="market_bucks" value="" placeholder="Market Bucks" class="form-control token_input" >
       </div>
     </div>
     <br>

  <?php } if (in_array('ATM', $currency_names)) { ?>
       <div class="form-group checkout_div_form">
         <label class=" checkout_div col-md-6 control-label">ATM Tokens</label>
          <div class="col-md-6">
           <input id="atm_tokens" type="number" pattern="\d*" name="atm_tokens" value="" placeholder="ATM Amount" class="form-control token_input" >
         </div>
       </div>
       <br>
   <?php } if (in_array('wic_input_checkout', $currency_names)) { ?>
        <div class="form-group checkout_div_form">
          <label class=" checkout_div col-md-6 control-label">WIC</label>
           <div class="col-md-6">
            <input id="wic_input_checkout" type="number" pattern="\d*" name="wic_input_checkout" value="" placeholder="WIC Amount" class="form-control token_input" >
          </div>
        </div>
        <br>
    <?php } if (in_array('fmnp', $currency_names)) { ?>
   <div class="form-group checkout_div_form">
     <label class=" checkout_div col-md-6 control-label">FMNP</label>
     <div class="col-md-6">
         <input id="fmnp" type="number" pattern="\d*" name="fmnp" value="" placeholder="FMNP" class="form-control" >
       </div>
     </div>
     <br>
   <?php } if (in_array('fvc', $currency_names)) { ?>
  <div class="form-group checkout_div_form">
    <label class=" checkout_div col-md-6 control-label">FVC</label>
    <div class="col-md-6">
        <input id="fvc" type="number" pattern="\d*" name="fvc" value="" placeholder="FVC" class="form-control" >
      </div>
    </div>
    <br>
  <?php } if (in_array('MM Tokens', $currency_names)) { ?>
  <div class="form-group checkout_div_form">
    <label class=" checkout_div col-md-6  control-label">MM Tokens</label>
    <div class="col-md-6">
      <input id="mm_tokens" type="number" pattern="\d*" name="mm_tokens" value="" placeholder="MM Token Amount" class="form-control mm_token_input" >
    </div>
  </div>
  <br>
    <?php } if (in_array('MM Vouchers', $currency_names)) { ?>
         <div class="form-group checkout_div_form">
           <label class=" checkout_div col-md-6 control-label">MM Vouchers</label>
            <div class="col-md-6">
             <input id="mm_vouchers" type="number" pattern="\d*" name="mm_vouchers" value="" placeholder="MM Voucher Amount" class="form-control mm_voucher_input" >
           </div>
         </div>
        <br>
      </div>

      <div class="col-xs-4">
     <?php } if (in_array('FMNP FVC', $currency_names)) { ?>
          <div class="form-group checkout_div_form">
            <label class=" checkout_div col-md-6 control-label">FMNP FVC</label>
              <div class="col-md-6">
              <input id="fmnp_fvc" type="number" pattern="\d*" name="fmnp_fvc" value="" placeholder="FMNP FVC Amount" class="form-control fmnp_fvc_input" >
              </div>
            </div>
          <br>
      <?php } if (in_array('Open Door', $currency_names)) { ?>
            <div class="form-group checkout_div_form">
              <label class=" checkout_div col-md-6 control-label">Open Door</label>
              <div class="col-md-6">
                <input id="open_door" type="number" pattern="\d*" name="open_door" value="" placeholder="Open Door Amount" class="form-control open_door_input" >
              </div>
            </div>
          <br>

      <?php } if (in_array('Piersons', $currency_names)) { ?>
             <div class="form-group checkout_div_form">
               <label class=" checkout_div col-md-6 control-label">Piersons</label>
                <div class="col-md-6">
                 <input id="piersons_amount" type="number" pattern="\d*" name="piersons_amount" value="" placeholder="Piersons Amount" class="form-control piersons_input" >
               </div>
             </div>
             <br>
      </div>
      <div class="col-xs-4">
      </div>

     <br>
     <div class="col-md-2">
     </div>
   </div>
   <div class="row">
      <div class="col-md-3">
      </div>
     <div class="col-md-6">
       <div class="form-group checkout_div_form">
       <label class=" col-sm-4 control-label">Comment</label>
       <div class="col-md-4">
         <textarea id="comment" type="text" name="comment" value="" placeholder="Comments " class="form-control" rows="2">  </textarea>
       </div>
     </div>
     <br><br>

   <?php } /* if (in_array('cambria', $currency_names)) { */?>
       <div class="form-group checkout_div_form">
         <label class=" checkout_div col-md-6 control-label">Owed</label>
          <div class="col-md-6">
            <div class="col-md-12 input-group">
            <span class="input-group-addon">$</span>
            <input id='total_owed' type="number"  class="form-control formBlock" name="total_owed"  placeholder="Owed to Market" readonly/>
          </div>
          </div>
       </div>
       <?php /* } else { */ ?>
         <!-- <div class="form-group checkout_div_form">
              <label class="col-sm-6 control-label">Owed</label>
              <div class="col-sm-6">
                <div class="col-md-12 input-group">
                   <span class="input-group-addon">$</span>
                   <input id='total_owed' type="number"  class="form-control formBlock" name="total_owed"  placeholder="Owed to Market" readonly/>
                 </div>
               </div>
          </div> -->
         <?php /* }; */ ?>

      </div>
      <div class="col-md-3">
      </div>
      </div>
    </div>
                </form>
                <br><br><br>
                <div class="row checkout_buttons">
                <input type="button" form="newcheckout" class="btn btn-warning btn-receipt" onclick='submitForm()' value='Save' id="submit">
                <input type='button' class="btn btn-success btn-receipt" value='Print' onclick='printDiv(); submitForm();'>
                <input type="button" class="btn btn-primary" onclick='email(); submitForm();' value="Email">
              </div>
          </div>
        </div></center>
      </div>

      <div class="item" style="overflow-x:auto;">

      <div id="checkout_table"></div>
          <center>
          <table class="table table-striped table-bordered table-condensed checkout_table_width" >
            <colgroup>
             <col width="20%" />
             <col width="6%" />
             <col width="6%" />
             <col width="10%" />
             <col width="10%" />
             <col width="10%" />
             <col width="10%" />
             <col width="10%" />
             <col width="10%" />
             <col width="50%" />
           </colgroup>
      <thead>
        <tr>
        <th class="checkout_table">Name</th>
      <?php if (in_array('cambria_sales', $currency_names)) {?>
        <th class="checkout_table">Sales</th>
      <?php } else { ?>
        <th class="checkout_table">Fee</th>
      <?php }; ?>
        <th class="checkout_table">Paid</th>
      <?php if (in_array('EBT Tokens', $currency_names)) {?>
        <th class="checkout_table">EBT Tokens</th>
      <?php }; if (in_array('EBT Match', $currency_names)) {?>
        <th class="checkout_table">EBT Match</th>
      <?php }; if (in_array('MM Tokens', $currency_names)) {?>
        <th class="checkout_table">MM Tokens</th>
      <?php }; if (in_array('MM Vouchers', $currency_names)) {?>
        <th class="checkout_table">MM Vouchers</th>
      <?php }; if (in_array('FMNP FVC', $currency_names)) {?>
        <th class="checkout_table">FMNP</th>
      <?php }; if (in_array('Open Door', $currency_names)) {?>
        <th class="checkout_table">Open Door</th>
      <?php }; if (in_array('Piersons', $currency_names)) {?>
        <th class="checkout_table">Piersons Amount</th>
      <?php }; if (in_array('ATM', $currency_names)) {?>
        <th class="checkout_table"> ATM Tokens </th>
      <?php }; if (in_array('wic_input_checkout', $currency_names)) {?>
        <th class="checkout_table"> WIC </th>
      <?php }; if (in_array('fmnp', $currency_names)) {?>
        <th class="checkout_table"> FMNP </th>
      <?php }; if (in_array('fvc', $currency_names)) {?>
        <th class="checkout_table"> FVC </th>
      <?php }; if (in_array('market_bucks_morro_bay', $currency_names)) {?>
        <th class="checkout_table"> Market Bucks </th>
      <?php };?>
        <th>Actions</th>
    </tr>
  </thead>
  <tbody id="tbl">

  </tbody>



</table>
</center>
        </div>

      <div class="item">
      <div class="col-md-12">
        <!-- Table built from get_total_checkout.php file -->
        <div id="end_of_market_totals_table"></div>
      </div>
    </div>




  </div>
  <!-- <a class="left carousel-control" href="#checkout_slides" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="right carousel-control" href="#checkout_slides" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> -->


        </div>

</div> <!-- Page Wrapper -->
    <hr>

<!-- Date Modal -->

<div id="dateModal" class="modal fade" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
        <center><h4 class="modal-title">Please Choose Date</h4></center>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="date_form">
         <div class="form-group">
          <center><label class="col-sm-4 control-label">Date</label>
           <div class="col-sm-8">
             <input name="date" value="" id="checkout_date" class="form-control dateinput"  type="date" onchange="date_change(event); day_of_week(this)">
           </div></center>
           <br><br>
           <!-- <button type="button" id="mymodal" class="btn btn-warning" data-toggle="modal" data-target="#myModal">View Reciept</button> -->
         </div>
         <input name="market_id" value="<?= $market_id ?>"  id="market_id" class="form-control" style="display:none;">
         <input name="id_market_short" value="<?= $id_market ?>"  id="market_id" class="form-control" style="display:none;">
       </form>
      </div>
      <div class="modal-footer">
        <center><button type="button" class="btn btn-success" data-dismiss="modal">Checkout</button></center>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<!-- Modal -->
<div class="modal fade" id="addnewvendor" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content vendor_checkout">
      <button type="button" class="close" data-dismiss="modal" >
        <span aria-hidden="true">&times;</span>
      </button>
      <div class="modal-header"><h2>Add New Vendor</h2>
      </div>
      <br>
      <form action="" method="post" id='newvendorform' novalidate>
          <input id="vendor_row_id" name="vendor_row_id" value="" class="form-control" style="display:none;">
            <div class="form-group">
                <label for="vendor_name">Vendor Name (Same as Certified Producer, if any) *</label>
                  <input type="text" name="vendor_name" value="" placeholder="Vendor Name" class="form-control" required="required" id="add_vendor_name" >
                  <input id="users_id" name="users_id" value="<?= $authenticated_user ?>" type="text" style="display:none;">
            </div>
            <div class="form-group">
                <label for="business_name">Business Name *</label>
                <input type="text" name="business_name" value="" placeholder="Business Name" class="form-control" id="add_business_name">
            </div>
            <!-- <div class="form-group">
                <label for="vendor_state">State *</label>
                <input type="text" name="vendor_state" value="" placeholder="California" class="form-control" id="vendor_state">
            </div> -->

            <!-- <div class="form-group">
                <label for="cpc_number">Certified Producers Certificate (CPC) #</label>
                <input type="text" name="cpc_number" value="" placeholder="11-1111 " class="form-control" id="cpc_number">
                <label for="cpc_number_exp">CPC Expiration</label>
                <input type="date" name="cpc_number_exp" value="" placeholder="" class="form-control" id="cpc_number_exp">
            </div> -->
            <input class="myselect" name="choose_market[]" value="<?= $id_market?>" id="choose_markets_input" readonly style="display:none">

            <div class="form-group">
                <label>Vendor Type * </label>
                <label class="radio-inline">
                    <input type="radio" name="vendor_type" value="certified" id="certified"/> Certified
                </label>
                <label class="radio-inline">
                    <input type="radio" name="vendor_type" value="non-certified" id="noncertified"/> Non-Certified
                </label>
                <label class="radio-inline">
                    <input type="radio" name="vendor_type" value="ancillary"  id="ancillary"/> Ancillary
                </label>
            </div>

            <div class="form-group" id="certificate_number">
                <label for="certificate_number"> Certificate Number *</label>
                <input style="background: rgb(192,192,192)" type="text" name="certificate_number" value="" placeholder="11-111-1111" class="form-control" id="certificate_number_input" >
            </div>

            <div class="form-group" id="certificate_expiration">
                <label for="certificate_expiration">Expiration *</label>
                <input style="background: rgb(192,192,192)" type="date" name="certificate_expiration" value="" placeholder="11-111-1111" class="form-control" id="certificate_expiration_input">
            </div>

            <div class="form-group" id="products_sold">
                <label for="certificate_expiration">Products being Sold *</label>
                <input style="background: rgb(192,192,192)" type="text" name="products_sold" value="" placeholder="Products being Sold" class="form-control" id="products_sold_input">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email</label>
                    <input  type="email" name="vendor_email" value="" placeholder="E-Mail Address" class="form-control" id="email">
            </div>
            <div class="form-group text-center">
                <label></label>
                <button onclick="addVendor()" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
            </div>
      </form>

    </div>
  </div>
</div>
<!---- Add Edit Market Modal End -->


<!--Main container end-->

<script>

$('#vendor_added').hide();

$("#certificate_number").hide();
$("#certificate_expiration").hide();
$('#products_sold').hide();

$('#certified').on('click', function () {
 $("#certificate_number").show();
  $("#certificate_expiration").show();
  $('#products_sold').hide();
});

$('#noncertified').on('click', function() {
 $("#products_sold").show();
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});

$('#ancillary').on('click', function() {
  $("#products_sold").hide();
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});


$('#business_name_select').on('change', function() {
  get_vendor_details(this.value)
});

$(".bootstrap-select>.dropdown-toggle ").css('background-color: red;');


$(document).ready(function() {

  $("#date").change(load_table);
  $('#dateModal').modal('show');
  if (week_day != marketDayDB ) {
    alert("This is not your normal checkout day, do you still want to proceed?");
  } else {}
  $(end_of_market_totals_table());
  $("#date").change(function(){
  $("#date_input[type=text]").val($(this).val());
  });
  load_table()

  $(".carousel").carousel({
    interval: false
  });
  $(".carousel").swipe({
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'left') $(this).carousel('next');
      if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll:"vertical"
  });
    window.onload=function() {
    document.getElementById("business_name_select").onchange=function() {
  <?php if (in_array('cambria', $currency_names)) { ?>
        document.getElementsByName("total_owed")[0].focus();
  <?php } else { ?>
        document.getElementsByName("custom_owed")[0].focus();
  <?php }; ?>
      }
    }
  $('#checkout_slides').on('slide.bs.carousel', function () {
    //$(".checkout_slides-target.active").removeClass("active");

    // $('#checkout_slides').on('slid.bs.carousel', function () {
    //   var to_slide = $(".carousel-item.active").attr("data-slide-no");
    //   console.log(to_slide);
    //   $(".nav-indicators li[data-slide-to=" + to_slide + "]").addClass("active");
  	//  });

     $('.checkout_slides').on('slide', function() {
    var to_slide = $('.carousel-inner .item.active').attr('data-slide-no');
    $('.carousel-indicators').children().removeClass('active');
    $('.carousel-indicators [data-slide-to=' + to_slide + ']').addClass('active');
    });
   });
  $('.nav li').click(function(){
    $('.nav li').removeClass('active');
    $(this).addClass('active');
})

//Update Reciept Fields

    $("#ebt_tokens").keyup(function() {
      var val = $(this).val();
      $("#ebt_tokens_receipt").html(val);
    });

    $("#ebt_match").keyup(function() {
      var val = $(this).val();
      $("#ebt_match_receipt").html(val);
    });

    $("#market_bucks").keyup(function() {
      var val = $(this).val();
      $("#market_bucks_receipt").html(val);
    });

    $("#atm_tokens").keyup(function() {
      var val = $(this).val();
      $("#atm_tokens_receipt").html(val);
    });

    $("#wic_input_checkout").keyup(function() {
      var val = $(this).val();
      $("#wic_receipt").html(val);
    });

    $("#fmnp").keyup(function() {
      var val = $(this).val();
      $("#fmnp_receipt").html(val);
    });

    $("#fvc").keyup(function() {
      var val = $(this).val();
      $("#fvc_receipt").html(val);
    });

    $("#fmnp_fvc").keyup(function() {
      var val = $(this).val();
      $("#fmnp_fvc_receipt").html(val);
    });

    $("#mm_tokens").keyup(function() {
      var val = $(this).val();
      $("#mm_tokens_receipt").html(val);
    });

    $("#mm_vouchers").keyup(function() {
      var val = $(this).val();
      $("#mm_vouchers_receipt").html(val);
    });

    $("#open_door").keyup(function() {
      var val = $(this).val();
      $("#open_door_receipt").html(val);
    });

    $("#piersons_amount").keyup(function() {
      var val = $(this).val();
      $("#piersons_receipt").html(val);
    });

    $("#comment").keyup(function() {
      var val = $(this).val();
      $("#comment_receipt").html(val);
    });





});




function addnewvendor(){
  $('#addnewvendor').modal('show');
}
function addVendor(){
  event.preventDefault();
  var biz_name = document.getElementById('add_business_name');
  var ven_name = document.getElementById('add_vendor_name');

  if((biz_name.value).length < 1 || ven_name.value == "" )
  {
      // alert("Phone number should be minimum 10 digits");
      document.getElementById('add_business_name').style.borderColor = 'red';
      document.getElementById('add_vendor_name').style.borderColor = 'red';
      return false;
  }
	 $.ajax({
		type: "POST",
		url: "forms/add_vendor_form.php",
		cache: false,
		data: $('#newvendorform').serialize(),
    beforeSend:function(){
     $('#add_vendor').val("Inserting");
    },
		success: function(){
      checkout_vendor_list();
      $('#newvendorform')[0].reset();
      $('#addnewvendor').modal('hide');
      $('.modal-backdrop').remove();
      //$(this).removeData('#newvendorform');

		},
		error: function(){
			alert("Please Enter All Fields");
		}
	});
}




var flat_fee = parseInt('<?=$flat?>') * 0.01;
var percentage_fee =  parseInt('<?=$percentage?>');
var custom_owed_value = document.getElementById("custom_owed")
var marketDayDB = "<?= $week_day ?>";
var d = new Date();
var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var wkday = days[d.getDay()];
var weekDayNum = d.getDay();  //Weekday day num by #
var week_day = day_of_week();
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;


$("#newcheckout").submit(function(event){
  submitForm();
  return false;
});

$("input").keyup(function () {
  update();
});

document.getElementById('checkout_date').value = today;
document.getElementById('checkout_date_2').value = today;
document.getElementById('checkout_date_3').value = today;
document.getElementById('checkout_date_4').value = today;
document.getElementById('checkout_date_wic').value = today;


function showDate(element) {
    var text = element.options[element.selectedIndex].text;
    document.getElementById("show_date").innerHTML = text;
}


function update() {
  var custom = $('#custom_owed').val();
  var sales = $('#custom_owed').val();
  var ebt_tokens  = Number($('#ebt_tokens').val());   // get value of field
  var ebt_match = Number($('#ebt_match').val()); // convert it to a float
  var atm_tokens  = Number($('#atm_tokens').val());
  var wic_input_checkout  = Number($('#wic_input_checkout').val());
  var mm_tokens  = Number($('#mm_tokens').val());
  var mm_vouchers  = Number($('#mm_vouchers').val());
  var fmnp_fvc  = Number($('#fmnp_fvc').val());
  var open_door  = Number($('#open_door').val());
  var piersons_amount  = Number($('#piersons_amount').val());
  var fmnp  = Number($('#fmnp').val());
  var fvc  = Number($('#fvc').val());
  var market_bucks  = Number($('#market_bucks').val());
  var owed = 0;
  var fee;
  if (flat_fee && percentage_fee) {
    var perc = sales * (percentage_fee*0.01);
    owed = sales < 400 ? flat_fee : perc;
    fee = sales < 400 ? '$' + flat_fee : percentage_fee + '%';

  } else if (flat_fee) {
    owed = flat_fee;
    fee = '$' + flat_fee;
  } else if (percentage_fee) {
    var perc = sales * (percentage_fee*0.01);
    owed = perc + 2;
    //console.log(owed+200)
    fee = percentage_fee + '%';
  } else {
    owed = custom;
  }

  var market_fee = owed

  //if (typeof ebt_tokens != 'undefined') owed -= ebt_tokens;
  if ( ebt_tokens ) owed -= ebt_tokens;
  if (ebt_match) owed -= ebt_match;
  if (atm_tokens) owed -= atm_tokens;
  if (wic_input_checkout) owed -= wic_input_checkout;
  if (mm_tokens) owed -= mm_tokens;
  if (mm_vouchers) owed -= mm_vouchers;
  if (fmnp_fvc) owed -= fmnp_fvc;
  if (open_door) owed -= open_door;
  if (piersons_amount) owed -= piersons_amount;
  if (fmnp) owed -= fmnp;
  if (fvc) owed -= fvc;
  if (market_bucks) owed -= market_bucks;

  if (owed <= 0) {
    $('#total_owed').css('color', 'red');
  }
  else {
    $('#total_owed').css('color', 'green');
  }

  var total_owed = owed

  // console.log(parseFloat(total_owed).toFixed(2))
  document.getElementById('total_owed').value = parseFloat(total_owed).toFixed(2);
  // document.getElementById('fee').value = parseFloat(market_fee).toFixed(2);
  document.getElementById("paid").textContent='$'+ parseFloat(owed).toFixed(2);
  //document.getElementById("totalsalesoutput").textContent='$'+ sales;
}



function submitForm(){
    event.preventDefault();
  <?php if (in_array('cambria', $currency_names)) { ?>
    if((custom_owed.value).length < 1 || business_name_select.value == "" || business_name_select.value == "Choose Vendor" )
    {
        document.getElementById('custom_owed').style.borderColor = 'red';
        return false;
    }
  <?php } else { ?>
    if((custom_owed.value).length < 1 || business_name_select.value == "" || business_name_select.value == "Choose Vendor" )
    {
        $("selectpicker option:selected").css('backgroundColor', '#000000');
        document.getElementById('custom_owed').style.borderColor = 'red';
        return false;
    }
  <?php }; ?>
    $.ajax({
      type: "POST",
     url: "./forms/checkout_form.php",
     cache:false,
     data: $('#newcheckout').serialize(),
      beforeSend:function(){
        $('#add_vendor').val("Inserting");
      },
      success: function(response){
        resetForm()
        show_success()
        load_table();
        end_of_market_totals_table();
        checkout_vendor_list();
        //$('#scrollCheckout').effect("highlight", {}, 3000);
        $(window).scrollTop($('#scrollCheckout').offset().top -100 );
        $('#scrollCheckout').css({background: '#F5F5F5'});


      },
       error: function(){
         alert("Error");
       }
    });
}

function show_success(){
  $("#success-alert-vendor").fadeTo(2000, 500).slideUp(500, function(){
  $("#success-alert-vendor").slideUp(500);

  });

}



function submitWic(){
    event.preventDefault();
    $.ajax({
      type: "POST",
     url: "./forms/wic_form.php",
     cache:false,
     data: $('#wic_form').serialize(),
      beforeSend:function(){
      },
      success: function(result){
        var json = JSON.parse(result)
        // console.log(json);

        var first = null;
        var second = null;

        json.forEach((val, i) => {
          var count = val.count;
          if (i === 0) {
            first = count;
          } else {
            second = count;
          }
        });

        console.log(first, second);

         $("#wic_amount").val(""),
         $("#wic_number").val(""),
         $("#mm_amount").val(""),
         $("#wic_edit_id").val(""),
         $('input[name="customer_type"]').prop('checked', false),
         document.getElementById('wic_existing').value = second;
         document.getElementById("wic_new").value = first;
         end_of_market_totals_table()
         wic_table()

      },
       error: function(){
         alert("Error");
       }
    });
}

function wic_table() {
  event.preventDefault();
  $.ajax({
    type: "POST",
   url: "./forms/wic_table_form.php",
   cache:false,
   data: $('#wic_form').serialize(),
    beforeSend:function(){
    },
    success: function(result){
      var json = JSON.parse(result)
      console.log(json)

      $("#wic_tbl tr").remove();
       var total_wic_amount = 0, total_mm_amount = 0, total_customers = 0;
       var tr;

       for (var i = 0; i < json.length; i++) {
           tr = $('<tr/>');
           tr.append("<td>" + json[i].wic_number + "</td>");
           tr.append("<td>$" + json[i].wic_amount + "</td>");
           tr.append("<td>$" + json[i].mm_amount + "</td>");
           tr.append("<td>" + json[i].customer_type + "</td>");
           tr.append('<td><a class="btn btn-primary" style="margin-right: 4px;" onclick="edit_wic(' + json[i].id + ')"><span class="glyphicon glyphicon-edit"></span> <a onclick="delete_wic(' + json[i].id + ')" class="btn btn-danger" style="margin-right: 4px;"><span class="glyphicon glyphicon-trash" ></span> </td>');
           $('#wic_tbl').append(tr);

           total_wic_amount += (isNaN(parseFloat(json[i].wic_amount)) ? 0 : parseFloat(json[i].wic_amount));
           total_mm_amount += (isNaN(parseFloat(json[i].mm_amount)) ? 0 : parseFloat(json[i].mm_amount));
           total_customers++;
         }
        ////////////////////////////////////////////////////////////////////////////////////
        // append the row with total colums
        tr = $('<tr/>');
        tr.append('<td><b>Total Customers: '+total_customers+'</b></td>');
        tr.append('<td><b>EBT Out $ '+(isNaN(total_wic_amount) ? 0 : total_wic_amount)+'</b></td>');
        tr.append('<td><b>MM Out $ '+(isNaN(total_mm_amount) ? 0 : total_mm_amount)+'</b></td>');
        tr.append('<td><b></b></td>');
        $('#wic_tbl').append(tr);
    }


  });
}

function delete_wic(wic_id){
  var answer=confirm('Do you want to delete this WIC Entry?');
      if(answer){
        jQuery.ajax({ /* THEN THE AJAX CALL */
          type: "GET",
          url: "forms/delete_wic_form.php",
          data: {id: wic_id},
          success: function(result){ /* GET THE TO BE RETURNED DATA */
            wic_table()
          },
          error: function(){
            console.log('Error Delete WIC')
          }
        });
      }
}

function edit_wic(wic_id){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  jQuery.ajax({ /* THEN THE AJAX CALL */
    type: "GET",
    url: "forms/edit_wic_form.php",
    data: {id: wic_id},
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      var json = JSON.parse(result)
      console.log(json[0])
      $("#wic_edit_id").val(json[0].id)
      $('#wic_number').val(json[0].wic_number)
      $('#wic_amount').val(json[0].wic_amount)
      $('#mm_amount').val(json[0].mm_amount)

      if (json[0].customer_type == 'new') {
        $( "#new" ).prop( "checked", true );
      } else {
        $( "#existing" ).prop( "checked", true );
      }
    },
    error: function(){
      console.log('Error')
    }
  });
}

$('#wic_number').on('keyup', function(){
    $num = $('#wic_number').val();
    console.log($num)
    $.ajax({
        url:'./forms/check_existing.php?number='+$num,
        complete: function(data){

            if(data.responseText=='1' || data.responseText==1){
                $('#existing').prop('checked', true);
                $('#new').prop('checked', false);
            }else if(data.responseText=='0' || data.responseText==0){
                $('#new').prop('checked', true);
                $('#existing').prop('checked', false);
            }

        }
    });

})







//Print
function printDiv()
{
  var divToPrint=document.getElementById('invoice-POS');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},10);
}

function resetForm()
{
  $('#select_vendor').show();
  $("#custom_owed").val("");
  $("#ebt_match").val("");
  $("#ebt_tokens").val("");
  $("#atm_tokens").val("");
  $("#wic_input_checkout").val("");
  $("#mm_vouchers").val("");
  $("#mm_tokens").val("");
  $("#piersons_amount").val("");
  $("#comment").val("");
  $("#fmnp_fvc").val("");
  $("#open_door").val("");
  $("#piersons").val("");
  $("#fmnp").val("");
  $("#fvc").val("");
  $("#fee").val("");
  $("#total_owed").val("");
  $("#custom_owed").val("");
  $("#market_bucks").val("");
  $("#checkout_row_id").val("");
  <?php if (in_array('cambria', $currency_names)) { ?>
        document.getElementById('total_owed').style.borderColor = '';
  <?php } else { ?>
        document.getElementById('custom_owed').style.borderColor = '';
  <?php }; ?>

  document.getElementById('business_name_select').style.borderColor = '';
    $('#scrollCheckout').css("background-color", "")
  $('#scrollCheckout').effect("highlight", {color: "#BDECB6"}, 3000);
}

//email reciept
function email() {
  let data = {
    total_owed: $('#total_owed').val(),
    custom_owed: $('#custom_owed').val(),
    business_name: $('#business_name_select').val(),
    vendor_email: $('#vendor_email').val(),
    checkout_date: $('#checkout_date').val(),
    sellers_fee: $('#sellers_fee').val(),
    checkout_market_name: $('#checkout_market_name').val(),
    market_id: $('#market_id').val(),
    custom_owed: $('#custom_owed').val(),
    mm_vouchers: $('#mm_vouchers').val(),
    mm_tokens: $('#mm_tokens').val(),
    ebt_tokens: $('#ebt_tokens').val(),
    fmnp_fvc: $('#fmnp_fvc').val(),
    piersons_amount: $('#piersons_amount').val(),
    comment: $('#comment').val(),
    piersons: $('#piersons').val(),
    open_door: $('#open_door').val(),
    fmnp: $('#fmnp').val(),
    fvc: $('#fvc').val(),
    admin_email: $('#admin_email').val(),
    img_url: $('#img_url').val(),
    flat_fee: $("#flat_fee").val(),
    market_bucks: $("#market_bucks").val(),
  };
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "mail/mail.php",
    cache:false,
    data: data,
    success: function(result){
      console.log(result)
      // (result = ' Mailer Error: You must provide at least one recipient email address. ')
      if  (result == 'sent') {
        $("#success-alert-email").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert-email").slideUp(500);
        });
      } else  {
        $("#failed-alert-email").fadeTo(2000, 500).slideUp(500, function(){
        $("#failed-alert-email").slideUp(500);
        });

      }

        $('.success').fadeIn(1000);
    }
  });
};

function checkout()
{
  var x = confirm("Do you really want to complete checkout?");
  if (x) {
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "./forms/checkout_market_final.php",
    cache:false,
    data: $('#checkout_market').serialize(),
    beforeSend:function(){
      $('#add_market').val("Inserting");
    },
    success: function(response){
    //window.location = './markets.php';
    },
   error: function(){
     alert("Error");
   }
  });
} else
    return false;
}

function checkout_vendor_list(){
  //console.log('call')

  $.ajax({
    type: "POST",
    url: "./forms/get_checkout_vendor_dropdown.php",
    cache:false,
    data: $('#date_form').serialize(),
    beforeSend:function(){
    },
    success: function(result){
      $("#business_name_select").empty();
      var json = JSON.parse(result)
      //Array.prototype.unshift.call(json, 'Choose Vendor');
      for (var i in json) {
        $('#business_name_select').append($('<option value="' + json[i] + '" data-value="' + json[i] + '">' + json[i] + '</option>'));
      }
      $('.selectpicker').selectpicker(
        {
          liveSearchPlaceholder: 'Choose Vendor'
        }
      );

      $('#business_name_select').selectpicker('refresh');

    },
   error: function(){
     alert("Vendor List not shown");
   }
  });
}

function day_of_week() {
  var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  var weekdayNum = ["1", "2", "3", "4", "5", "6", "0"];

  var d = document.getElementById('checkout_date').valueAsDate;
  //var n = d.getDay()
  //document.getElementById("output").innerHTML = weekdayNum[n];
  return weekDayNum;
};

function date_change(e){
  document.getElementById('checkout_date_2').value = e.target.value;
  document.getElementById('checkout_date_3').value = e.target.value;
  document.getElementById('checkout_date_4').value = e.target.value;
  load_table()

}

function load_table(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  console.log('load table')
var x = $('#date_form').serialize();
  $.ajax({ /* THEN THE AJAX CALL */
    type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
    url: "forms/get_checkout.php", /* PAGE WHERE WE WILL PASS THE DATA */
    data: $('#date_form').serialize(),//week_selected, /* THE DATA WE WILL BE PASSING */
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      var json = JSON.parse(result)
      console.log('This is'+json)
      $("#tbl tr").remove();
      var total_ebt_tokens = 0, total_ebt_match = 0, total_paid = 0, total_mm_tokens = 0, total_mm_vouchers = 0, total_fmnp_fvc = 0,
            total_open_door = 0, total_piersons_amount = 0, total_atm_tokens = 0, total_wic_input_checkout = 0, total_fmnp = 0,
            total_fvc = 0, total_vendor = 0, total_custom_fee = 0, total_market_bucks = 0;
      var tr;
       for (var i = 0; i < json.length; i++) {
           tr = $('<tr/>');
           tr.append("<td>" + json[i].name + "</td>");
            tr.append("<td>$" + json[i].custom_fee + "</td>");
           tr.append("<td>$" + json[i].paid + "</td>");
        <?php if (in_array('EBT Tokens', $currency_names)) {?>
           tr.append("<td>$" + json[i].ebt_tokens + "</td>");
        <?php }; if (in_array('EBT Match', $currency_names)) {?>
           tr.append("<td>$" + json[i].ebt_match + "</td>");
        <?php }; if (in_array('MM Tokens', $currency_names)) {?>
           tr.append("<td>$" + json[i].mm_tokens + "</td>");
        <?php }; if (in_array('MM Vouchers', $currency_names)) {?>
           tr.append("<td>$" + json[i].mm_vouchers + "</td>");
        <?php }; if (in_array('FMNP FVC', $currency_names)) {?>
           tr.append("<td>$" + json[i].fmnp_fvc + "</td>");
        <?php }; if (in_array('Open Door', $currency_names)) {?>
           tr.append("<td>$" + json[i].open_door + "</td>");
         <?php }; if (in_array('Piersons', $currency_names)) {?>
           tr.append("<td>$" + json[i].piersons_amount + "</td>");
        <?php }; if (in_array('ATM', $currency_names)) {?>
           tr.append("<td>$" + json[i].atm_tokens + "</td>");
       <?php }; if (in_array('wic_input_checkout', $currency_names)) {?>
          tr.append("<td>$" + json[i].wic_input_checkout + "</td>");
        <?php }; if (in_array('fmnp', $currency_names)) {?>
           tr.append("<td>$" + json[i].fmnp + "</td>");
         <?php }; if (in_array('fvc', $currency_names)) {?>
            tr.append("<td>$" + json[i].fvc + "</td>");
          <?php }; if (in_array('market_bucks_morro_bay', $currency_names)) {?>
             tr.append("<td>$" + json[i].market_bucks + "</td>");
        <?php };?>
       tr.append('<td><a class="btn btn-primary" style="margin-right: 4px;" data-target="#checkout_slides" data-slide-to="1" onclick="edit_checkout_vendor(' + json[i].id + ')"><span class="glyphicon glyphicon-edit"></span> <a onclick="delete_checkout_vendor(' + json[i].id + ')" class="btn btn-danger" style="margin-right: 4px;"><span class="glyphicon glyphicon-trash" ></span> </td>');
       $('#tbl').append(tr);
       total_paid += parseFloat(json[i].paid);
       total_custom_fee += (isNaN(parseFloat(json[i].custom_fee)) ? 0 : parseFloat(json[i].custom_fee));
       total_ebt_tokens += (isNaN(parseFloat(json[i].ebt_tokens)) ? 0 : parseFloat(json[i].ebt_tokens));
       total_ebt_match += (isNaN(parseFloat(json[i].ebt_match)) ? 0 : parseFloat(json[i].ebt_match));
       total_mm_tokens += (isNaN(parseFloat(json[i].mm_tokens)) ? 0 : parseFloat(json[i].mm_tokens));
       total_mm_vouchers += (isNaN(parseFloat(json[i].mm_vouchers)) ? 0 : parseFloat(json[i].mm_vouchers));
       total_fmnp_fvc += (isNaN(parseFloat(json[i].fmnp_fvc)) ? 0 : parseFloat(json[i].fmnp_fvc));
       total_open_door += (isNaN(parseFloat(json[i].open_door)) ? 0 : parseFloat(json[i].open_door));
       total_piersons_amount += (isNaN(parseFloat(json[i].piersons_amount)) ? 0 : parseFloat(json[i].piersons_amount));
       total_atm_tokens += (isNaN(parseFloat(json[i].atm_tokens)) ? 0 : parseFloat(json[i].atm_tokens));
       total_wic_input_checkout += (isNaN(parseFloat(json[i].wic_input_checkout)) ? 0 : parseFloat(json[i].wic_input_checkout));
       total_fmnp += (isNaN(parseFloat(json[i].fmnp)) ? 0 : parseFloat(json[i].fmnp));
       total_fvc += (isNaN(parseFloat(json[i].fvc)) ? 0 : parseFloat(json[i].fvc));
       total_market_bucks += (isNaN(parseFloat(json[i].market_bucks)) ? 0 : parseFloat(json[i].market_bucks));
       total_vendor++;
       console.log(total_market_bucks)
       }
       ////////////////////////////////////////////////////////////////////////////////////
       // append the row with total colums
       tr = $('<tr/>');
       tr.append('<td><b>Number of Vendors: '+total_vendor+'</b></td>');
       tr.append('<td><b>$ '+(isNaN(total_custom_fee) ? 0 : total_custom_fee)+'</b></td>');
       tr.append('<td><b>$ '+(isNaN(total_paid) ? 0 : total_paid)+'</b></td>');
    <?php if (in_array('EBT Tokens', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_ebt_tokens) ? 0 : total_ebt_tokens)+'</b></td>');
    <?php }; if (in_array('EBT Match', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_ebt_match) ? 0 : total_ebt_match)+'</b></td>');
    <?php }; if (in_array('MM Tokens', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_mm_tokens) ? 0 : total_mm_tokens)+'</b></td>');
    <?php }; if (in_array('MM Vouchers', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_mm_vouchers) ? 0 : total_mm_vouchers)+'</b></td>');
    <?php }; if (in_array('FMNP FVC', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_fmnp_fvc) ? 0 : total_fmnp_fvc)+'</b></td>');
    <?php }; if (in_array('Open Door', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_open_door) ? 0 : total_open_door)+'</b></td>');
    <?php }; if (in_array('Piersons', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_piersons_amount) ? 0 : total_piersons_amount)+'</b></td>');
    <?php }; if (in_array('ATM', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_atm_tokens) ? 0 : total_atm_tokens)+'</b></td>');
   <?php }; if (in_array('wic_input_checkout', $currency_names)) {?>
      tr.append('<td><b>$ '+(isNaN(total_wic_input_checkout) ? 0 : total_wic_input_checkout)+'</b></td>');
    <?php }; if (in_array('fmnp', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_fmnp) ? 0 : total_fmnp)+'</b></td>');
   <?php }; if (in_array('fvc', $currency_names)) {?>
      tr.append('<td><b>$ '+(isNaN(total_fvc) ? 0 : total_fvc)+'</b></td>');
    <?php }; if (in_array('market_bucks_morro_bay', $currency_names)) {?>
       tr.append('<td><b>$ '+(isNaN(total_market_bucks) ? 0 : total_market_bucks)+'</b></td>');
    <?php };?>
       $('#tbl').append(tr);
      end_of_market_totals_table();
      checkout_vendor_list();
    }
  });
}


function end_of_market_totals_table(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
var x = $('#date_form').serialize();
  $.ajax({ /* THEN THE AJAX CALL */
    type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
    url: "forms/get_end_of_market.php", /* PAGE WHERE WE WILL PASS THE DATA */
    data: $('#date_form').serialize(),//week_selected, /* THE DATA WE WILL BE PASSING */
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      $("#end_of_market_totals_table").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
    }
  });
}



function edit_checkout_vendor(vendor_id){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  jQuery.ajax({ /* THEN THE AJAX CALL */
    type: "GET",
    url: "forms/edit_checkout_form.php",
    data: {id: vendor_id},
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      var json = JSON.parse(result)
      edit_vendor(json);
      console.log(json)
      $([document.documentElement, document.body]).animate({ scrollTop: $("#custom_owed") }, 2000);
      $('html, body').animate({ scrollTop: $("#scrollCheckout").offset().top }, 200);
      // $('#scrollCheckout').effect("highlight", {}, 19000);
      $('#scrollCheckout').css("background-color", "#FDFD96")
      //$('#select_vendor').hide();
    },
    error: function(){
      console.log('Error')
    }
  });
}

function edit_vendor(vendors) {
  var vendor = vendors[0];
  //console.log(vendor.business_name)
   $('#checkout_row_id').val(vendor.id)
   $('#fee').val(vendor.total_owed)
   $('#ebt_tokens').val(vendor.ebt_tokens)
   $('#ebt_match').val(vendor.ebt_match)
   $('#atm_tokens').val(vendor.atm_tokens)
   $('#wic_input_checkout').val(vendor.wic_input_checkout)
   $('#mm_tokens').val(vendor.mm_tokens)
   $('#piersons_amount').val(vendor.piersons_amount)
   $('#mm_vouchers').val(vendor.mm_vouchers)
   $('#fmnp_fvc').val(vendor.fmnp_fvc)
   $('#open_door').val(vendor.open_door)
   $('#vendor_type').val(vendor.vendor_type)
   $('#flat_fee').val(vendor.flat_fee)
   $('#percentage_fee').val(vendor.percentage_fee)
   $('#custom_owed').val(vendor.custom_fee)
   $('#total_owed').val(vendor.total_owed)
   $('#custom_owed').val(vendor.custom_fee)
   $('#comment').val(vendor.comment)
   $('#vendor_email').val(vendor.vendor_email)
   $('#fmnp').val(vendor.fmnp)
   $('#fvc').val(vendor.fvc)

   $("#business_name_select").empty();
   $('#business_name_select').append($('<option value="' + vendor.business_name + '" data-value="' + vendor.business_name + '">' + vendor.business_name + '</option>'));
   $('#business_name_select').selectpicker('refresh');
}

function delete_checkout_vendor(vendor_id){
  var answer=confirm('Do you want to delete this checkout?');
      if(answer){
        jQuery.ajax({ /* THEN THE AJAX CALL */
          type: "GET",
          url: "forms/delete_checkout_form.php",
          data: {id: vendor_id},
          success: function(result){ /* GET THE TO BE RETURNED DATA */
            load_table()
            resetForm()
          },
          error: function(){
            console.log('Error Delete Checkout')
          }
        });
      }
}



function get_vendor_details(value){
  $.ajax({
    type: "GET",
    url: "./forms/get_vendor_details.php",
    cache:false,
    data: {business_name: value},
    beforeSend:function(){
    },
    success: function(result){
      var json = JSON.parse(result)
      console.log(json)
      var inf_o = json[0];
       document.getElementById("vendor_email").value = inf_o.email;
       document.getElementById("vendor_type").value = inf_o.type;
    },
   error: function(){
     alert("Error");
   }
  });
}







</script>


<?php include_once './includes/footer.php'; ?>
