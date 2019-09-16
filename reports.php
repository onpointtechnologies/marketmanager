<?php
session_start();
require_once './config/config.php';
include_once 'includes/header.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$date = date('m/d/Y', time());
//$market_id = $_GET['market_id'];

///////////////////Query for Markets '////////////////////////'
$q1 = $db->prepare("SELECT * FROM markets WHERE user_id = ? ");
$q1->execute(array($authenticated_user));


///////////////////Query for Weeks ////////////////////////
$q3 = $db->prepare("SELECT * FROM weeks");
$q3->execute();

////////////////////////////////////Query for Fee /////////////////
$q2 = $db->prepare("SELECT * FROM markets ");
$q2->execute();
$fee_query2 = $q2->fetch();
      //Vars//
$id_market = $fee_query2['id'];
$img = $fee_query2['img_url'];
$flat = (double)$fee_query2['flat_fee'];
$percentage = (double)$fee_query2['percentage_fee'];



$q4 = $db->prepare("SELECT * FROM vendors WHERE users_id = ? ORDER BY business_name");
$q4->execute(array($authenticated_user));

$q5 = $db->prepare("SELECT * FROM vendors WHERE users_id = ? ORDER BY business_name ");
$q5->execute(array($authenticated_user));
//       //Vars//


////Build Vendor Drop down list ////
$market_sql = $db->prepare('
 SELECT v.*
 FROM vendors v,
 markets_vendors mv
 WHERE mv.vendors_id = v.id
 AND mv.markets_id = ?
');
$market_sql->execute([$id_market]);
//// End Build Vendor Drop down list ////

//////////////////////Displays or Hides Market Bucks Field /////////////////////////
$q2 = $db->prepare("SELECT * FROM market_currency  WHERE market_id = ? ");
$q2->execute(array($id_market));
$currency_names = [];
while ( $result = $q2->fetch()){
  array_push($currency_names, $result['market_currency_name']);
}
$currency_query = $q2->fetch();
$currency_name = $currency_query['market_currency_name'];
$currency_value = $currency_query['market_currency_value'];
//////////////////////Displays or Hides Market Bucks Field END/////////////////////////

$market_select = (!empty($market_id) ? $market_id: '');

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
</style>

<!--Main container start-->
<div>
  <div class="well filter-form main_con">

    <div class="row">
      <h1>Reports</h1>
      <hr>
        <div class="row">
          <div class="col-md-1">
          </div>
          <div class="col-md-1">
            <button id="single_market_button" class="btn btn-primary">Single Market</button>
          </div>
            <div class="col-md-1">
              <button id="state_report_button" class="btn btn-warning" onclick='state()'>State</button>
            </div>
            <div class="col-md-1">
              <button id="vendor_report_button" class="btn btn-info">Vendor</button>
            </div>
            <div class="col-md-1">
              <button id="ecology_button" class="btn btn-success">Ecology Center Report </button>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-1">
              <button class="btn btn-danger" id="create_report_button">Create Custom Report</button>
            </div>
            <div class="col-md-3">
            </div>

          </div>
      <hr>

      <form action="" method="post" id="single_report_form">
        <input name="state_bin" value=""  id="state_bin"  style="display:none">
        <input name="authenticated_user" value="<?= $authenticated_user ?>" style="display:none">

    <div class="col-lg-2" id="choose_vendor_div">
      <label class="col-sm-10 control-label">Choose Vendor</label>
        <select id='vendor_name' name="vendor_name" style="width: 190px;">
           <option  value = "">Certified Producer</option>
           <?php
           while ($row = $q5->fetch())
           {
             echo '<option value="'.htmlspecialchars($row['business_name']).' ">'.htmlspecialchars($row['business_name']).'</option>';
           }
           ?>
             </select>
      </div>


      <div class="col-lg-2" id="choose_market_div">
        <label class="col-sm-10 control-label">Choose Market</label>
          <div class="col-sm-4">
            <select id='market' name="market" style="width: 120px;" >
              <option  value = "<?= $market_select ?>"><?= $market_select ?></option>
                 <?php
                   while ($m1 = $q1->fetch())
                   {
                     echo '<option value="'.htmlspecialchars($m1['public_id']).'-'.htmlspecialchars($m1['market_name']).'">'.htmlspecialchars($m1['market_name']).'</option>';
                   }
                   ?>
            </select>
          </div>
        </div>
        <div id="single_report">
        <div class="col-lg-2" id="choose_month">
          <label class="col-sm-10 control-label">Month</label>
            <div class="col-sm-4">
              <select id='month_choice' name="month_choice" >
                <option value="">~None~</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select>
            </div>
          </div>

          <div class="col-lg-2" id='choose_quarter'>
            <label class="col-sm-10 control-label">Quarter</label>
              <div class="col-sm-4">
                <select id='quarter' name="quarter" >
                  <option value="">~None~</option>
                  <option value="1">Q1</option>
                  <option value="2">Q2</option>
                  <option value="3">Q3</option>
                  <option value="4">Q4</option>
                </select>
              </div>
            </div>
        <div class="col-lg-2">
          <label class="col-sm-10 control-label">Date</label>
            <div class="col-sm-12">
              <input name="checkout_date" value=""  id="checkout_date" class="form-control dateinput"  type="date" >
            </div>
          </div>
      </form>
      <div class="col-lg-2">
        <div id="view_report_single">
          <input type="button" class="btn btn-success" value="View Report"/>
          <button  id="view_report_single" type="button" class="btn btn-export" onclick="tableToExcel('single_report_table_export', 'name', 'report.xls')" value="Export to Excel">Export</button>
        </div>
        <div id="view_report_state">
          <input type="button" id="view_report_state"class="btn btn-success" value="View Report"/>
          <button  id="view_report_single" type="button" class="btn btn-export" onclick="tableToExcel('state_report_table_export', 'name', 'report.xls')" value="Export to Excel">Export</button>
        </div>
        <div id="view_report_vendor">
          <input type="button" class="btn btn-success" value="View Report"/>
          <button  id="view_report_single" type="button" class="btn btn-export" onclick="tableToExcel('vendor_report_table_export', 'name', 'report.xls')" value="Export to Excel">Export</button>
        </div>
        <div id="view_report_ecology">
          <input type="button" class="btn btn-success" value="View Report"/>
          <button  id="view_report_ecology" type="button" class="btn btn-export" onclick="tableToExcel('vendor_report_table_export', 'name', 'report.xls')" value="Export to Excel">Export</button>
        </div>
      </div>



    </div>
  </div>
</div>
      <div class="col-md-2">
      </div>
      </div>
      <hr>

  </div>
    </div>
      <div class='row'>
        <div class='col-md-10'>
          <div id="show"></div>
        </div>
      </div>
      </div>


    <div class="row">
      <div class="col-md-1">
      </div>
      <div class="col-md-10">
      <div class="form-group" id="create_report">
        <label> Create Report</label>
        <button type="button" class="close" aria-label="Close" id='close_report'>
          <span aria-hidden="true">&times;</span>
        </button>
        <hr>
        <form action="" method="post" id="vendor_info_form">
          <div class="row">
          <input name="report_name" id="report_name" placeholder="Name Report"/>
        </div>
        <br>
          Certified Producer<select id='vendor_id' name="vendor_id" style="width: 190px;">
           <option  value = "">~Select Vendor~</option>
           <?php
           while ($r_vendors = $q4->fetch())
           {
             echo '<option value="'.htmlspecialchars($r_vendors['id']).' ">'.htmlspecialchars($r_vendors['business_name']).'</option>';
           }
           ?>
             </select>
          <input name="name_of_certified_producer" id="name_of_certified_producer" style="display:none;" />
          <input name="certificate_number" placeholder="Certificate Number"  id="certificate_number" />
          <input name="issuing_county" placeholder="Issuing County" id="issuing_county"/>
          <input name="dates_participated" placeholder="5/4, 5/5, 5/6" id="dates_participated"/>
          <input  name="total" placeholder="Total" id="total" readonly/>
          <span><button type="button" class="fa" onclick='save_entry();'><span aria-hidden="true">&#xf067;</span></button></span>
          </form>

          <hr>

          <div class='col-md-10'>
            <div id="show_report"></div>
          </div>

          <button type="button" class="btn btn-export" onclick="tableToExcel('show_report', 'name', 'report.xls')" value="Export to Excel">Export</button>
      </div>
    </div>
      <div class="col-md-1">
      </div>
      <BR><BR><BR><BR><BR>
    </div>

    <a id="dlink"  style="display:none;"></a>



<!--Main container end-->

<script>

$('#create_report').hide();
$('#single_report').hide();
$('#state_report').hide();
$('#ecology_table').hide();
$('#vendor_report').hide();
$('#choose_market_div').hide();
$('#choose_vendor_div').hide();
$("#vendor_id").change(get_vendor_info);
$("#report_name").keyup(get_vendor_info);

function showWeek(element) {
    var text = element.options[element.selectedIndex].text;
    document.getElementById("show_week").innerHTML = text;
}

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



///Mysql query for table
$(document).ready(function(){ /* PREPARE THE SCRIPT */
    $("#single_report_form").change(single_report_table);


});

//Count words in Custom Report
$("#dates_participated").keyup(function(){
var value = $(this).val().replace(" ", "");
var words = value.split(",");
var wordcount =  words.length;
document.getElementById("total").value = wordcount;
});

function resetSearch()
{ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  $("#vendor_name").val("");
  $("#market").val("");
  $("#month_choice").val("");
  $("#quarter").val("");
  $("#checkout_date").val("");
}


$(function(){
    $('#single_market_button').on('click',function(){
      $('#choose_market_div').show();
      $('#single_report').show();
      $('#view_report_single').show();
      $('#choose_month').show();
      $('#vendor_report').hide();
      $('#create_report').hide();
      $('#choose_quarter').hide();
      $('#choose_vendor_div').hide();
      $('#choose_vendor_table').hide();
      $('#view_report_state').hide();
      $('#view_report_vendor').hide();
      $('#view_report_ecology').hide();
      $('#state_report_table').hide();
      $('#ecology_table').hide();
      resetSearch();

    });
    $('#state_report_button').on('click',function(){
      $('#choose_market_div').show();
      $('#single_report').show();
      $('#view_report_single').hide();
      $('#vendor_report').hide();
      $('#single_report_table').hide();
      $('#create_report').hide();
      $('#choose_vendor_div').hide();
      $('#choose_vendor_table').hide();
      $('#view_report_state').show();
      $('#view_report_vendor').hide();
      $('#view_report_ecology').hide();
      $('#choose_month').hide();
      $('#choose_quarter').show();
      $('#ecology_table').hide();
      resetSearch();
    });

    $('#vendor_report_button').on('click',function(){
      $('#choose_market_div').show();
      $('#single_report').show();
      $('#choose_quarter').show();
      $('#view_report_vendor').show();
      $('#vendor_report').show();
      $('#choose_vendor_div').show();
      $('#view_report_single').hide();
      $('#vendor_report').hide();
      $('#single_report_table').hide();
      $('#create_report').hide();
      $('#choose_vendor_table').hide();
      $('#view_report_state').hide();
      $('#view_report_ecology').hide();
      $('#choose_month').hide();
      resetSearch();
    });

    $('#ecology_button').on('click',function(){
      $('#choose_market_div').show();
      $('#single_report').show();
      $('#view_report_ecology').show();
      $('#ecology_table').show();
      $('#choose_quarter').show();
      $('#view_report_single').hide();
      $('#vendor_report').hide();
      $('#single_report_table').hide();
      $('#create_report').hide();
      $('#choose_vendor_div').hide();
      $('#choose_vendor_table').hide();
      $('#view_report_state').hide();
      $('#view_report_vendor').hide();
      $('#choose_month').hide();
      resetSearch();
    });

    $('#view_report_single').on('click',function(){
      $('#single_report_table').show();
    });
    $('#view_report_state').on('click',function(){
      $('#state_report_table').show();
      $('#single_report_table').hide();
      $('#choose_vendor_table').hide();
    });
    $('#view_report_vendor').on('click',function(){
      $('#single_report_table').hide();
      $('#state_report_table').hide();
      $('#choose_vendor_table').show();
    });
    $('#view_report_ecology').on('click',function(){
      $('#ecology_table').show();
      $('#single_report_table').hide();
      $('#state_report_table').hide();
      $('#choose_vendor_table').hide();
    });


    $('#close_report').on('click',function(){
      $('#create_report').hide();
    });
    $('#create_report_button').on('click',function(){
      $('#create_report').show();
      $('#state_report_table').hide();
      $('#choose_vendor_table').hide();
      $('#single_report_table').hide();
      $('#single_report_form').hide();
    });
});


function single_report_table(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
var x = $('#single_report_form').serialize();
  $.ajax({ /* THEN THE AJAX CALL */
    type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
    url: "forms/get_report.php", /* PAGE WHERE WE WILL PASS THE DATA */
    data: $('#single_report_form').serialize(),//week_selected, /* THE DATA WE WILL BE PASSING */
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      $("#show").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
      $("#single_report_table").hide();
      $('#state_report_table').hide();
      $('#choose_vendor_table').hide();
      $('#ecology_table').hide();
      $("#state_bin").val("");

    }
  });
}



function get_vendor_info(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
var x = $('#vendor_info_form').serialize();
console.log(x);
  $.ajax({ /* THEN THE AJAX CALL */
    type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
    url: "forms/get_vendor_custom_report.php", /* PAGE WHERE WE WILL PASS THE DATA */
    data: $('#vendor_info_form').serialize(),//week_selected, /* THE DATA WE WILL BE PASSING */
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      var json = JSON.parse(result)
      show_vendor_info(json);
    }
  });
}

function show_vendor_info(vendors) {
var vendor = vendors[0];
//console.log(vendor.business_name);
//console.log(vendor.total_owed);
$('#name_of_certified_producer').val(vendor.business_name)
 $('#certificate_number').val(vendor.certificate_number)
 $('#issuing_county').val(vendor.issuing_county)
}

function save_entry() {
    var x;
    var y;
      x = document.getElementById("vendor_id").value;
      y = document.getElementById("dates_participated").value;
      if (x == "" ) {
          document.getElementById('vendor_id').style.borderColor = "red"
          $([document.documentElement, document.body]).animate({ scrollTop: $("#vendor_id") }, 2000);
        } else if (y == "") {

          document.getElementById('dates_participated').style.borderColor = "red"
          $([document.documentElement, document.body]).animate({ scrollTop: $("#dates_participated") }, 2000);
          return false;
      } else {

            event.preventDefault();
            $.ajax({
              type: "POST",
             url: "./forms/add_custom_report.php",
             cache:false,
             data: $('#vendor_info_form').serialize(),
              success: function(response){
                resetForm()
                custom_report_table()
              },
             error: function(){
               alert("Error");
             }
            });
          }
}
function custom_report_table(){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
var x = $('#vendor_info_form').serialize();
  $.ajax({ /* THEN THE AJAX CALL */
    type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
    url: "forms/get_custom_report.php", /* PAGE WHERE WE WILL PASS THE DATA */
    data: $('#vendor_info_form').serialize(),//week_selected, /* THE DATA WE WILL BE PASSING */
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      $("#show_report").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
    }
  });
}

function resetForm()
{ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  $("#name_of_certified_producer").val("");
  $("#vendor_id").val("");
  $("#issuing_county").val("");
  $("#certificate_number").val("");
  $("#total").val("");
  $("#dates_participated").val("");
};

function state(){
  var bin = '1'
  document.getElementById('state_bin').value = bin;
}

var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name, filename) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }

            document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();

        }
    })()




</script>




<?php include_once './includes/footer.php'; ?>
