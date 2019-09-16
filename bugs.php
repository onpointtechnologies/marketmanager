<?php
session_start();
require_once './config/config.php';
include_once 'includes/header.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



include_once 'includes/header.php';
?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97558181-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97558181-2');
</script>


<link href="./css/checkout.css" rel="stylesheet" />
<style>
.main_con {
  padding-left: 45px !important;
}

.btn-checkout {
  background-color: #77dd77;
  font-style: bold;
  color: white;
}
</style>

<!--Main container start-->

  <div class="well filter-form main_con">
    <br><br>
    <div class="row">
      <center><h1>Bugs and Fixes</h1></center>
      <hr>
    </div>
  </div>

      <div class='row'>

        <div class="col-md-1">
        </div>
        <div class='col-md-10'>
          <div class="col-md-1">
            <button  id="checkout_table_button" class="btn btn-checkout" >Checkout</button>
          </div>
          <div class="col-md-1">
            <button  id="report_table_button" class="btn btn-checkout" >Reports</button>
          </div>
          <div class="col-md-1">
            <button  id="vendor_table_button" class="btn btn-checkout" >Vendors</button>
          </div>
          <br><hr><br>

        <div id="checkout_table">
          <table class="table table-bordered table-condensed" >
            <tr>
              <th>Bug</th>
              <th>Staus</th>
            </tr>
            <tr class="bug_heading" >
              <td>Checkout</td>
              <td> </td>
            </tr>
                  <tr class="bug_table_drop">
                    <td>switch checkout table and market</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>turn vendor and amount red if either are not select/inputed</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Date Prefilled into Date Modal (works for me, need to test different environments)</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>End of Market tab adjust ag vs non ag and fees (NCGA)</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>Checkout Market Save Dialog before exiting</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Checkout table buttons side by side</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>piersons column last in checkout table</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>disable pre-market tab</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Wic Customer Tab</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>add vendor from checkout screen</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>prefill total in checkout when editing</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>email from edit</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Toggles between checkout screen matching buttons</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>Amount fee charged is not correct when edit</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>change drop down to show default "Choose Vendor"</td>
                    <td class="bug_complete">Done</td>
                  </tr>

                  <tr>
                    <td>amount fee charged is not correct when edit</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>change verbiage for emailed reciepts</td>
                    <td class="bug_progress">Waiting for Verbiage</td>
                  </tr>
                  <tr>
                    <td>if email fails, show alert, if succed add alert for 5 second saying email sent</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>change drop down to show default "Choose Vendor"</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>checkout table not scrolling enough (does it locally, live DB Problem</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Totals at bottom of checkout Table</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Scrolling for table on mobile doesn't work because user just scrolls table</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>Save Dialogs always show</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
            <tr>
      </table>
      <br><hr><br>
    </div>


    <div id="report_table">
      <table class="table table-bordered table-condensed">
              <td class="bug_heading">Reports</td>
              <td> </td>
            </tr>
                  <tr>
                    <td>show vendor report</td>
                    <td class="bug_complete">Done</td>
                  </tr>
                  <tr>
                    <td>Add currency columns and amounts to vendor report</td>
                    <td class="bug_complete">done</td>
                  </tr>
                  <tr>
                    <td>Show market tokens for market and Vendor Reports</td>
                    <td class="bug_complete">done</td>
                  </tr>
                  <tr>
                    <td>Quarterly Report Export</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
                  <tr>
                    <td>Report Button from market screen needs to load that market in the report</td>
                    <td class="bug_progress">In Progress</td>
                  </tr>
            </table>
              <br><hr><br>
          </div>

          <div id="vendor_table">
            <table class="table table-bordered table-condensed">
              <tr>
                <td class="bug_heading">Vendors</td>
                <td> </td>
              </tr>
                    <tr>
                      <td>Add Field to add vendors products for all vendors</td>
                      <td class="bug_progress">In Progress</td>
                    </tr>
                    <tr>
                      <td>Add/delete markets associated with vendor from edit screen</td>
                      <td class="bug_progress">In Progress</td>
                    </tr>
              <tr>
                <td class="bug_heading">Misc</td>
                <td> </td>
              </tr>
                  <tr>
                    <td></td>
                    <td class="bug_progress"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="bug_progress"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="bug_progress"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="bug_progress"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="bug_progress"></td>
                  </tr>
      </table>
        <br><hr><br>
    </div>


        <div class="col-md-1">
        </div>
      </div>
      </div>

<script>
$("#checkout_table").hide();
$("#report_table").hide();
$("#vendor_table").hide();


$("#checkout_table_button").on("click", function(){
  $("#checkout_table").toggle();
  $("#report_table").hide();
  $("#vendor_table").hide();
});

$("#report_table_button").on("click", function(){
  $("#report_table").toggle();
  $("#checkout_table").hide();
  $("#vendor_table").hide();
});

$("#vendor_table_button").on("click", function(){
  $("#vendor_table").toggle();
  $("#checkout_table").hide();
  $("#report_table").hide();
});



</script>







<?php include_once './includes/footer.php'; ?>
