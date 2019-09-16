<?php
require_once './config/config.php';
include_once 'includes/header_admin.php';

//if($_SESSION['isAdmin']==true) {


// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// $q1 = $db->prepare("SELECT * FROM users WHERE id > 1 AND id < 200");
// $q1->execute();


// // $query = " SELECT mv.vendors_id, v.id, v.vendor_name, v.users_id, v.vendor_phone, v.business_name, v.vendor_email, v.vendor_type,
// //                   v.certificate_expiration, v.certificate_number, v.products_sold, GROUP_CONCAT(m.id) market_ids,
// //                   GROUP_CONCAT(m.market_name) market_names FROM vendors v LEFT JOIN markets_vendors mv ON mv.vendors_id = v.id
// //                   LEFT JOIN markets m ON mv.markets_id = m.id WHERE v.users_id = $authenticated_user GROUP BY v.id ";
// // $query = $db->query($query);
// // $vendors = $query ->fetch();

// $sql = $db->prepare("SELECT market_name, id FROM markets WHERE user_id = '$authenticated_user' ");
// $sql->execute();

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
            <h1 class="page-header">Markets</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            	<button class="btn btn-success" data-toggle="modal" data-target="#addnewvendor" ><span class="glyphicon glyphicon-plus"></span> Add new </button>
	            </a>
            </div>
        </div>
    </div>
    <!--    Begin filter section-->
    <div class="well text-center filter-form">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
    </div>
<!--   Filter section end-->
    <hr>

    <table class="table table-striped table-bordered table-condensed" id="vendor_table">
        <thead>
          <tr>
              <th width="600">Name</th>
              <th width="500">Email</th>
              <th width="80">Association</th>
              <th width="110"> City </th>
              <th width="250">State</th>
              <th width="210"> Phone </th>
              <th width="210"> Actions </th>
          </tr>
        </thead>
      <tbody id="vendor_results">
          <?php foreach ($q1 as $row) : ?>
              <tr>
                <td ><?php echo htmlspecialchars($row['name']) ?></td>
                <td ><?php echo htmlspecialchars($row['email']) ?></td>
                <td><?php echo htmlspecialchars($row['association']) ?></td>
                <td><?php echo htmlspecialchars($row['city']) ?></td>
                <td><?php echo htmlspecialchars($row['state']) ?></td>
                <td><?php echo htmlspecialchars($row['phone']) ?></td>

                <td style='white-space: nowrap'>
                  <a href='admin_markets.php?u_d=<?=$row["id"]?>'  class="btn btn-primary" style="margin-right: 8px;">View Markets</span>
      </tr>
						<!-- Delete Confirmation Modal-->
					 <div class="modal fade" id="confirm-delete-<?php echo $row['id'] ?>" role="dialog">
					    <div class="modal-dialog">
					      <form action="delete_market.php" method="POST">
					      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          <h4 class="modal-title">Confirm</h4>
						        </div>
						        <div class="modal-body">

						        		<input type="hidden" name="del_id" id = "del_id" value="<?php echo $row['id'] ?>">

						          <p>Are you sure you want to delete this market?</p>
						        </div>
						        <div class="modal-footer">
						        	<button type="submit" class="btn btn-default pull-left">Yes</button>
						         	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						        </div>
						      </div>
					      </form>

					    </div>
  					</div>
            <!-- End Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--    Pagination links end-->


    <!-- Modal -->
    <div class="modal fade" id="addnewvendor" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h2>Add New Vendor</h2>
          </div>
          <br>
          <form action="" method="post" id='newvendorform' novalidate>
                <div class="form-group">
                    <label for="vendor_name">Vendor Name (Same as Certified Producer, if any) *</label>
                      <input type="text" name="vendor_name" value="" placeholder="Vendor Name" class="form-control" required="required" id="vendor_name" >
                      <input id="users_id" name="users_id" value="<?= $authenticated_user ?>" type="text" style="display:none;">
                </div>

                <div class="form-group">
                    <label for="business_name">Business Name *</label>
                    <input type="text" name="business_name" value="" placeholder="Business Name" class="form-control" id="business_name">
                </div>

              <div class="form-group">
                <label for="choose_market">Choose Market(s)</label>
                <select class="myselect" name="choose_market[]" multiple>
                  <?php while ($market = $sql->fetch()): ?>
                    <option value="<?=$market['id']?>"><?=$market['market_name']?></option>
                  <?php endwhile; ?>
                </select>
              </div>
                <div class="form-group">
                    <label>Vendor Type * </label>
                    <label class="radio-inline">
                        <input type="radio" name="vendor_type" value="certified" checked="checked"  id="certified"/> Certified
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
                    <input style="background: rgb(192,192,192)" type="text" name="certificate_number" value="" placeholder="11-111-1111" class="form-control" >
                </div>

                <div class="form-group" id="certificate_expiration">
                    <label for="certificate_expiration">Expiration *</label>
                    <input style="background: rgb(192,192,192)" type="date" name="certificate_expiration" value="0000-00-00" placeholder="11-111-1111" class="form-control" id="certificate_expiration">
                </div>

                <div class="form-group" id="products_sold">
                    <label for="certificate_expiration">Products being Sold *</label>
                    <input style="background: rgb(192,192,192)" type="text" name="products_sold" value="" placeholder="Products being Sold" class="form-control" id="products_sold">
                </div>

                <br>

                <div class="form-group">
                    <label for="email">Email</label>
                        <input  type="email" name="vendor_email" value="" placeholder="E-Mail Address" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                        <input name="vendor_phone" value="" placeholder="987654321" class="form-control"  type="number" id="phone">
                </div>
                <div class="form-group text-center">
                    <label></label>
                    <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
                </div>
          </form>

        </div>
      </div>
    </div>
    <!---- Add Edit Market Modal End -->


    <!-- Modal Vendor to Market -->
    <div class="modal fade" id="addvendortomarket" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h2>Add New Vendor</h2>
          </div>
          <br>
          <form action="" method="post" id='newvendorform' novalidate>
                <div class="form-group">
                    <label for="vendor_name">Vendor Name (Same as Certified Producer, if any) *</label>
                      <input type="text" name="vendor_name" value="" placeholder="Vendor Name" class="form-control" required="required" id="vendor_name" >
                </div>

                <div class="form-group">
                    <label for="business_name">Business Name *</label>
                    <input type="text" name="business_name" value="" placeholder="Business Name" class="form-control" required="required" id="business_name">
                </div>

              <div class="form-group">
                <label for="choose_market">Choose Market(s)</label>
                <select class=" myselect" multiple="true" name="choose_market" placeholder="Start typing or click to add market(s)" >
                  <option>Select Market(s)</option>
                  <?php

                  while ($market = $sql->fetch())
                  {
                    $selected = $market["market_name"] == $vendor_event ? ' selected' : '';

                    echo '<option'.$selected.' value="'.htmlspecialchars($market["market_name"]).'">'.htmlspecialchars($market["market_name"]).'</option>';
                  }
                  ?>
                </select>
              </div>
                <div class="form-group text-center">
                    <label></label>
                    <button type="submit" class="btn btn-warning" >Save <span class="glyphicon glyphicon-send"></span></button>
                </div>
          </form>

        </div>
      </div>
    </div>
    <!-- Add vendor to Market -->

    <!-- Modal -->
    <div class="modal fade" id="editnewmarket" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="modal-header"><h2>Add New Market</h2>
          </div>
          <br>
          <form action="" method="post" id='updatemarketform' novalidate>
            <div class="form-group">
                  <label for="market_name">Market Name *</label>
                    <input type="text" name="update_market_name" value="" placeholder=" Cambria Farmers Market" class="form-control" required="required" id = "update_market_name" >
              </div>
                <div class="form-group">
                  <label for="market_address">Market Address</label>
                    <input type="text" name="update_market_address" value="" placeholder="Address" class="form-control" id="update_market_address">
              </div>
              <div class="form-group">
                <label for="market_city">Market City</label>
                  <input type="text" name="update_market_city" value="" placeholder="City" class="form-control" id="update_market_city">
            </div>

              <div class="form-group">
                  <label>Certified * </label>
                  <label class="radio-inline">
                      <input type="radio" name="update_certified" value="yes"  required="required" id = "update_yes"/> Yes
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="update_certified" value="no"  required="required" id="update_no"/> No
                  </label>
              </div>


              <div class="form-group">
                  <label>Start Date</label>
                  <input name="update_start_date" value=""  placeholder="Start Date" class="form-control"  type="date" id='update_market_start_date'>
              </div>

              <div class="form-group">
                  <label>End Date</label>
                  <input name="update_end_date" value=""  placeholder="End Date" class="form-control"  type="date" id='update_market_end_date'>
              </div>

              <div class="form-group">
                  <label>Vendor Type * </label>
                  <label class="radio-inline">
                      <input type="radio"  value="update_both" checked="checked" required="required" id="update_both_fees"/> Both
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="update_flat_fee" value="flatfee"  required="required" id="update_flat_fee"/> Flat Fee
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="update_percentage_fee" value="percentage" required="required" id="update_percentage"/> Percentage
                  </label>

              </div>

              <div class="form-group" id="update_flat_fee">
                  <label for="flat_fee"> Flat Fee *</label>
                  <input type="text" name="flat_fee" value"" placeholder="Flat Fee" class="form-control">
              </div>

              <div class="form-group" id="update_percentage_fee">
                  <label for="percentage_fee">Percentage of Sales*</label>
                  <input type="text" name="percentage_fee" value="" placeholder="5%" class="form-control" >
              </div>

              <!-- Modal Footer -->
                <div class="modal-footer">
                  <input type="submit" class="btn btn-success" value="Update Market" onclick="updatemarketdetails()" id="submit">
                  </div>
          </form>

        </div>
      </div>
    </div>
    <!---- Add edit Market Modal End -->

</div>
<!--Main container end-->

<script>
$(document).ready(function(){
	$("#newvendorform").submit(function(event){

		submitForm();
		return false;
	});
});


function submitForm(){
  event.preventDefault();
	 $.ajax({
		type: "POST",
    //contentType: 'application/json',
		url: "https://arkitu.co/manager/forms/add_vendor_form.php",
		cache:false,
		data: $('#newvendorform').serialize(),
    beforeSend:function(){
     $('#add_vendor').val("Inserting");
    },
		success: function(response){
      $('#newvendorform')[0].reset();
      $('#addnewvendor').modal('hide');
      $('.modal-backdrop').remove();
      $("#vendor_table").load(window.location + " #vendor_table");
      $(this).removeData('#newvendorform');

		},
		error: function(){
			alert("Error");
		}
	});
}

$(function() {
$(".delete").click(function(){
  console.log('Test')
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "forms/delete_vendor.php",
   data: info,
   success: function(response){
     //$('.delete').reset();
     $("#vendor_table").load(window.location + " #vendor_table");

 },
});
  $(this).parents(".show").animate({ backgroundColor: "blue" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
});



$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#vendor_results tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});




 </script>

 <script>
 $(document).ready(function() {
     $("#products_sold").hide();
 });

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

 </script>

 <script>
 if ($('.myselect-service-package').length > 0) {
     $('.myselect-service-package').select2();
   };

   if ($('.myselect').length > 0) {
     $('.myselect').select2();
   };
 </script>
<?php // } else { header('location: sign-in.php '); }; ?>

<?php include_once './includes/footer.php'; ?>
