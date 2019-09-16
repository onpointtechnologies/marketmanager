<?php
require_once './config/config.php';
include_once 'includes/header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sql = $db->prepare("SELECT market_name, id FROM markets WHERE user_id = ? ");
$sql->execute(array($authenticated_user));

$q1 = $db->prepare("SELECT * FROM api  WHERE user_id = ? ");
$q1->execute(array($authenticated_user));
$api_list = [];
while ( $result = $q1->fetch()){
  array_push($api_list, $result['value']);
}


?>
<style>
.modal-content {
  padding: 10px;

}
.ttable-striped>tbody>tr:nth-child(odd)>td,
.table-striped>tbody>tr:nth-child(odd)>th {
  background-color: #e08283;
  color: black;
}
.table-striped>tbody>tr:nth-child(even)>td,
.table-striped>tbody>tr:nth-child(even)>th {
  background-color: #ECEFF1;
  color: black;
}
</style>


<!--Main container start-->
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-6">
            <h1 class="page-header">Vendors</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            	<button class="btn btn-success" data-toggle="modal" onclick="addnewvendor()" ><span class="glyphicon glyphicon-plus"></span> Add new </button>

            </div>
        </div>
    </div>

    <div id="checkout_slides" class="carousel slide" data-ride="carousel">
        <nav class="navbar navbar-default nav_bar" role="navigation" id="scroll_nav">
                    <div class=" navbar-static-top ">
                        <ol class="nav navbar-nav nav-indicators">
                            <li data-target="#checkout_slides" data-slide-to="0" class="checkout_slides-target inline"><a href="#">Vendors</a></li>
                            <li data-target="#checkout_slides" data-slide-to="1" class="checkout_slides-target  inline"><a href="#">Public API</a></li>
                        </ol>
                    </div>
                </nav>

        <div class="carousel-inner" >
          <div class="item active" id="item_active">
            <div class="well text-center filter-form">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
            <hr>
            <div id="vendor_table"></div>
            </div>

          <div class="item" style="overflow-x:auto;">
              <div class="row">
                <div class="alert alert-success" id="success_alert">
                    <button type="button" onclick="resetForm()" class="close" data-dismiss="alert">x</button>
                    <strong>Success! </strong>
                    Your changes have been saved!
                </div>

                  <center><div>Choose Categories to display publicly about vendors</div></center>
                  <hr>
                  <div class="col-sm-2">
                  </div>
                  <div class="col-sm-8">
                    <center>
                    <div class="row">
                    <form action="" method="post" id='api_form' novalidate>
                      <div class="btn-group" data-toggle="buttons">
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="vendor_name_api" id="vendor_name_api" value="vendor_name_api" <?php if ( in_array('vendor_name_api', $api_list)) {echo 'checked';} else{};?> > Vendor Name
                        </label>
                        <label class="radio-inline api_checkbox">
                          <input type="checkbox" name="business_name_api" id="business_name_api" value="business_name_api" <?php if ( in_array('business_name_api', $api_list)) {echo 'checked';} else{};?>> Vendor Business Name
                        </label>
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="address_api" id="address_api" value="address_api" <?php if ( in_array('address_api', $api_list)) {echo 'checked';} else{};?>> Address
                        </label>
                        <label class="radio-inline api_checkbox">
                          <input type="checkbox" name="city_api" id="city_api" value="city_api" <?php if ( in_array('city_api', $api_list)) {echo 'checked';} else{};?>> City
                        </label>
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="phone_api" id="phone_api" value="phone_api" <?php if ( in_array('phone_api', $api_list)) {echo 'checked';} else{};?>> Phone
                        </label>
                        <label class="radio-inline api_checkbox">
                          <input type="checkbox" name="email_api" id="email_api" value="email_api" <?php if ( in_array('email_api', $api_list)) {echo 'checked';} else{};?>> Email
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="btn-group" data-toggle="buttons">
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="type_api" id="type_api" value="type_api" <?php if ( in_array('type_api', $api_list)) {echo 'checked';} else{};?>> Type (certified, non-certified, anc.)
                        </label>
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="website_api" id="website_api" value="website_api" <?php if ( in_array('website_api', $api_list)) {echo 'checked';} else{};?>> Website
                        </label>
                        <label class="radio-inline api_checkbox">
                          <input type="checkbox" name="facebook_api" id="facebook_api" value="facebook_api" <?php if ( in_array('facebook_api', $api_list)) {echo 'checked';} else{};?>> Facebook
                        </label>
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="instagram_api" id="instagram_api" value="instagram_api" <?php if ( in_array('instagram_api', $api_list)) {echo 'checked';} else{};?>> Instagram
                        </label>
                        <label class="radio-inline api_checkbox">
                          <input type="checkbox" name="wic" id="wic_api" value="wic_api" <?php if ( in_array('wic_api', $api_list)) {echo 'checked';} else{};?>> Wic Approved
                        </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="btn-group" data-toggle="buttons">
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="product_api" id="product_api" value="product_api" <?php if ( in_array('product_api', $api_list)) {echo 'checked';} else{};?>> Products Sold
                        </label>
                        <label class="checkbox-inline api_checkbox">
                          <input type="checkbox" name="product_location_api" id="product_location_api" value="product_location_api" <?php if ( in_array('product_location_api', $api_list)) {echo 'checked';} else{};?>> Product Locations
                        </label>
                      </div>
                    </div>
                  </form>
                  <br><hr><br>
                <div class="row">
                  <h4> These are your script tags to embed Vendor Directory onto your website: </h4>
                  <textarea class="script_area"> &ltscript src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous">&lt/script&gt
                  &ltscript src="https://arkitu.co/manager/api/embed.js?id=<?= $authenticated_user ?>">&lt/script&gt </textarea>

                </div>
                </center>
                  </div>
                  <div class="col-sm-2">
                  </div>
              </div>
              <br><br><br><br><br><br>
          </div>
  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="addnewvendor" data-backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" >
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h2>Add New Vendor</h2>
          </div>
          <br>
          <form action="" method="post" id='newvendorform' novalidate>
            <input id="vendor_row_id" name="vendor_row_id" value="" class="form-control" style="display:none;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                      <label for="vendor_name">Vendor Name (Same as Certified Producer, if any) *</label>
                        <input type="text" name="vendor_name" value="" placeholder="Vendor Name" class="form-control" required="required" id="vendor_name" >
                        <input id="users_id" name="users_id" value="<?= $authenticated_user ?>" type="text" style="display:none;">
                  </div>
                  <div class="form-group">
                      <label for="business_name">Business Name *</label>
                      <input type="text" name="business_name" value="" placeholder="Business Name" class="form-control" id="business_name">
                  </div>
                </div>
                <div class="col-md-6 ">
                <!-- <form id="uploadimage" action="" method="post" enctype="multipart/form-data"> -->
                  <div id="image_preview" >
                    <center><img id="previewing" src="img/upload.png" width="50px" height="50px" /></center>
                    </div>
                    <hr id="line" >
                      <div id="selectImage" style="background-color: #C0C0C0;">
                      <center>  <label>Select Your Image</label><br/>
                          <input type="file" name="file" id="file" required disabled />
                          <input type="submit" value="Upload" class="submit" disabled />
                        </center>
                        </div>
                      <!-- </form> -->
                  </div>
              </div>
                <div class="form-group">
                    <label for="address">Address *</label>
                    <input type="text" name="address" value="" placeholder="111 Ocean Way" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="vendor_city">City *</label>
                    <input type="text" name="vendor_city" value="" placeholder="Santa Cruz" class="form-control" id="vendor_city">
                </div>

                <div class="checkBoxContainer"></div>

              <div class="form-group ">
                <label for="choose_market">Choose Market(s)</label>
                <select class="myselect" name="choose_market[]" id="choose_markets_input" multiple="multiple" style="padding-left: 20px">
                  <?php while ($market = $sql->fetch()): ?>
                    <option value="<?=$market['id']?>"><?=$market['market_name']?></option>
                  <?php endwhile; ?>
                </select>
              </div>
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

                <br>

                <div class="form-group" id="products_sold">
                    <label for="certificate_expiration">Products being Sold *</label>
                    <input type="text" name="products_sold" value="" placeholder="Products being Sold" class="form-control" id="products_sold_input">
                </div>

                <div class="form-group">
                    <label>Where Products can be Found</label>
                    <input type="text" name="product_location" value="" placeholder="Grocery Store, Local Markets, etc." class="form-control">
                    <!-- <input type="text" value="" data-role="tagsinput" placeholder="Add tags" /> -->
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                        <input  type="email" name="vendor_email" value="" placeholder="E-Mail Address" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                        <input name="vendor_phone" value="" placeholder="987654321" class="form-control"  type="number" id="phone">
                </div>
                <div class="form-group">
                    <label for="phone">Website</label>
                        <input name="website" value="" placeholder="www.arkitu.co" class="form-control"  type="text" id="website">
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                        <input name="instagram" value="" placeholder="@arkitumaps" class="form-control"  type="text" id="instagram">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                        <input name="facebook" value="" placeholder="ArkituMaps" class="form-control"  type="text" id="facebook">
                </div>
                <div class="form-group">
                    <label for="electronic_payment">Electronic Payment</label>
                        <input name="electronic_payment" value="" placeholder="Yes" class="form-control"  type="text" id="electronic_payment">
                </div>
                <div class="form-group">
                    <label for="wic_approved">WIC Approved</label>
                        <input name="wic_approved" value="" placeholder="Yes" class="form-control"  type="text" id="wic_approved">
                </div>
                <div class="form-group">
                    <label for="wic_exp">WIC Expiration</label>
                        <input name="wic_exp" value="" class="form-control"  type="date" id="wic_exp">
                </div>
                <div class="form-group">
                    <label for="wic_number">WIC Number </label>
                        <input name="wic_number" value="" placeholder="12345" class="form-control"  type="text" id="wic_number">
                </div>
                <div class="form-group text-center">
                    <label></label>
                    <button type="submit" onclick="save_new_vendor()" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
                </div>
          </form>

        </div>
      </div>
    </div>
    <!---- Add Edit Market Modal End -->


</div>
<!--Main container end-->

<script>
$(document).ready(function(){
	$("#newvendorform").submit(function(event){
		save_new_vendor();
		return false;
	});
  load_vendor_table()

  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#vendor_results tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


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



});



// $('#business_name_column').on('click', 'table tr', function() {
//     alert('Column Clicked');
// });

// $("#vendor_table").on("click", "tr", function() { alert('Column Clicked'); });


var table = $('#vendor_table');

$('#business_name_column, #city_header')
  .wrapInner('<span title="sort this column"/>')
  .each(function(){

      var th = $(this),
          thIndex = th.index(),
          inverse = false;

      th.click(function(){

          table.find('td').filter(function(){

              return $(this).index() === thIndex;

          }).sortElements(function(a, b){

              return $.text([a]) > $.text([b]) ?
                  inverse ? -1 : 1
                  : inverse ? 1 : -1;

          }, function(){

              // parentNode is the element we want to move
              return this.parentNode;

          });

          inverse = !inverse;

      });

  });

$('#certified').on('click', function () {
 $("#certificate_number").show();
  $("#certificate_expiration").show();
});

$('#noncertified').on('click', function() {
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});

$('#ancillary').on('click', function() {
  $('#certificate_number').hide();
  $('#certificate_expiration').hide();
});

function load_vendor_table(){
  $.ajax({
    type: "POST",
    url: "forms/vendors_table.php",
    success: function(result){
      $("#vendor_table").html(result);
    }
  });
}

function addnewvendor(){
  //$("#choose_markets_input").find('option').attr("selected",false) ;
 $('#choose_markets_input').multiselect('deselectAll', false);
 $("#choose_markets_input").multiselect('refresh');
  $('#addnewvendor').modal('show');
}


function save_new_vendor(){
  event.preventDefault();
	 $.ajax({
		type: "POST",
		url: "forms/add_vendor_form.php",
		cache: false,
		data: $('#newvendorform').serialize(),
    beforeSend:function(){
     $('#add_vendor').val("Inserting");
    },
		success: function(){
      $('#newvendorform')[0].reset();
      $('#addnewvendor').modal('hide');
      $('.modal-backdrop').remove();
      resetForm()
      $(this).removeData('#newvendorform');
      load_vendor_table()
		},
		error: function(){
			alert("Please Enter All Fields");
		}
	});
}

function editvendor(vendor_id){ /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
  jQuery.ajax({ /* THEN THE AJAX CALL */
    type: "GET",
    url: "forms/get_edit_vendor_details.php",
    data: {id: vendor_id},
    success: function(result){ /* GET THE TO BE RETURNED DATA */
      //console.log(result)
      var json = JSON.parse(result)
      edit_vendor(json);
      $("#addnewvendor").modal('show');
      //resetForm()
    },
    error: function(){
      console.log('Error')
    }
  });
}

function edit_vendor(vendors) {
  var vendor = vendors[0];

  var market_names_split;

  var markets = document.getElementById('choose_markets_input').options;
  //alert(myOpts[0].value + myOpts[0].text) //=> Value of the first option

  if (vendor.market_names == null) {

  } else {

    market_names_split = vendor.market_names.split(",");
    var arrayLength = market_names_split.length;
    var obj = {label:"", title:"", value:"", selected: false};
    var marketNames = [];

      for (var i=0; i<markets.length; i++)
        {
          obj = {};
          obj.label = markets[i].text;
          obj.title = markets[i].text;
          obj.value = markets[i].value;
          for(var j=0;j<arrayLength;j++)
          {
              if(market_names_split[j] == markets[i].text)
              {
                  obj.selected = true;
              }
          }

          marketNames.push(obj);
          //console.log(market_names_split[i]);
        }
        $("#choose_markets_input").multiselect('dataprovider', marketNames);

  }



   $('#vendor_row_id').val(vendor.id)
   $('#vendor_name').val(vendor.vendor_name)
   $('#business_name').val(vendor.business_name)
   $('#address').val(vendor.address)
   $('#vendor_city').val(vendor.vendor_city)
   $('#vendor_state').val(vendor.vendor_state)
   $('#phone').val(vendor.vendor_phone)
   $('#email').val(vendor.vendor_email)
   $('#certificate_expiration_input').val(vendor.certificate_expiration)
   $('#certificate_number_input').val(vendor.certificate_number)
   $('#cpc_number').val(vendor.cpc_number)
   $('#issuing_county').val(vendor.issuing_county)
   $('#vendor_type').val(vendor.vendor_type)
   $('#products_sold_input').val(vendor.products_sold)
   $('#website').val(vendor.website)
   $('#facebook').val(vendor.facebook)
   $('#instagram').val(vendor.instagram)
   $('#electronic_payment').val(vendor.electronic_payment)
   $('#organic').val(vendor.organic)
   $('#wic_approved').val(vendor.wic_approved)
   $('#wic_number').val(vendor.wic_number)
   $('#wic_exp').val(vendor.wic_exp)


   if (vendor.products_sold !== null)
    $("#products_sold_input").show();
    $('#certificate_number_input').hide();
    $('#certificate_expiration_input').hide();
    $( "#noncertified" ).prop( "checked", true );
    $( "#certified" ).prop( "checked", false );
    $( "#ancillary" ).prop( "checked", false );

   if (vendor.certificate_number !== null)
    $("#certificate_number_input").show();
    $("#certificate_expiration_input").show();
    $('#products_sold_input').hide();
    $( "#certified" ).prop( "checked", true );
    $( "#ancillary" ).prop( "checked", false );
    $( "#noncertified" ).prop( "checked", false );

   if (vendor.products_sold == null || vendor.certificate_number == null)
    $('#certificate_number').hide();
    //$('#certificate_expiration').hide();
    $("#products_sold").hide();
    //$( "#ancillary" ).prop( "checked", true );
    //$( "#certified" ).prop( "checked", false );
    //$( "#noncertified" ).prop( "checked", false );
}

function resetForm(){
$('#vendor_row_id').val("")
$('#vendor_name').val("")
$('#business_name').val("")
$('#address').val("")
$('#vendor_city').val("")
$('#vendor_state').val("")
$('#phone').val("")
$('#email').val("")
$('#certificate_expiration_input').val("")
$('#certificate_number_input').val("")
$('#cpc_number').val("")
$('#issuing_county').val("")
$('#vendor_type').val("")
$('#products_sold_input').val("")
$('#website').val("")
$('#facebook').val("")
$('#instagram').val("")
$('#electronic_payment').val("")
$('#organic').val("")
$('#wic_approved').val("")
$('#wic_number').val("")
$('#wic_exp').val("")
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
$('input[type=checkbox]').click(function() {
   if ($(this).is(":checked")) {
       //alert($(this).val());
       console.log($(this).val())
   }
});
//////////////////////////////////////////////////////////////////////
function delete_vendor(vendor_id){
  var answer=confirm('Do you want to delete this checkout?');
      if(answer){
        jQuery.ajax({ /* THEN THE AJAX CALL */
          type: "GET",
          url: "forms/delete_vendor.php",
          data: {id: vendor_id},
          success: function(result){ /* GET THE TO BE RETURNED DATA */
            load_vendor_table()
          },
          error: function(){
            console.log('Error Delete Checkout')
          }
        });
      }
}

// if ($('.myselect-service-package').length > 0) {
//    $('.myselect-service-package').select2();
//  };
//
//  if ($('.myselect').length > 0) {
//    $('.myselect').select2();
//  };

function submit_api(value){
  event.preventDefault();
  console.log(value)
	 $.ajax({
		type: "POST",
		url: "forms/api_param.php",
		cache: false,
		data: $('#api_form').serialize(),
		success: function(result){
      //console.log(result)
      show_success()
		},
		error: function(){
			alert("Please Enter All Fields");
		}
	});
}

function delete_api(value){
  event.preventDefault();
  //console.log(value)
	 $.ajax({
		type: "GET",
		url: "forms/api_param_delete.php",
		cache: false,
		data: {id: value},
		success: function(result){
      //console.log(result)
      show_success()
		},
		error: function(){
			alert("Please Enter All Fields");
		}
	});
}


$("#vendor_name_api, #business_name_api, #address_api, #city_api, #phone_api, #email_api, #type_api, #website_api, #facebook_api, #instagram_api, #wic_api, #product_api, #product_location_api").on('change', function() {
  if ($(this).is(':checked')) {
    //$(this).attr('value', 'true');
    submit_api()
  } else {
    var delete_id = $(this).val();
    //console.log(x)
    delete_api(delete_id)
  }
  //$('#checkbox-value').text($('#checkbox1').val());
});

function show_success(){
  $("#success_alert").fadeTo(2000, 500).slideUp(500, function(){
  $("#success_alert").slideUp(500);

  });

}

$(function() {

$('#choose_markets_input').multiselect({
            includeSelectAllOption: false,
            onChange: function(option, checked) {

               if($('#vendor_row_id').val()!="")
               {
                   // alert($('#vendor_row_id').val() + " - " + option.val());
                    if(checked==false)
                    {
                        deleteVendorMarket($('#vendor_row_id').val(), option.val());
                    }
                    else
                    {
                        insertVendorMarket($('#vendor_row_id').val(), option.val());
                    }
               }
         },
});

function deleteVendorMarket(vId, marketId)
{
     $.ajax({
		type: "GET",
		url: "forms/delete_vendor_market.php",
		cache: false,
		data: {vid: vId, marketId:  marketId},
		success: function(result){
                    //alert(result)
                    //show_success()
		},
		error: function(){
			alert("Please Enter All Fields");
		}
	    });
}

function insertVendorMarket(vId, marketId)
{
     $.ajax({
		type: "GET",
		url: "forms/insert_vendor_market.php",
		cache: false,
		data: {vid: vId, marketId:  marketId},
		success: function(result){
                    //alert(result)
                    //show_success()
		},
		error: function(){
			alert("Please Enter All Fields");
		}
	    });
}

$('#btnget').click(function() {

alert($('#choose_markets_input').val());

})

});


function filterText()
	{
		var rex = new RegExp($('#filterText').val());
		if(rex =="/all/"){clearFilter()}else{
			$('.content').hide();
			$('.content').filter(function() {
			return rex.test($(this).text());
			}).show();
	}
	}

function clearFilter()
	{
		$('.filterText').val('');
		$('.content').show();
	}






 </script>


<?php include_once './includes/footer.php'; ?>
