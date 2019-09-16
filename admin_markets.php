<?php
require_once './config/config.php';
include_once 'includes/header_admin.php';

if($_SESSION['isAdmin']==true) {
  
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user_id = $_GET['u_d'];

$query = $db->prepare("SELECT * FROM markets WHERE user_id = ?");
$query ->execute(array($user_id));

$q1 = $db->prepare("SELECT mc.market_id, mc.market_currency_name, m.id, m.market_name FROM markets m LEFT JOIN market_currency mc ON mc.market_id = m.id
                   WHERE m.user_id = ? ORDER BY market_name ");
$q1 ->execute(array($user_id));

$q_vendor = " SELECT mv.vendors_id, v.id, v.vendor_name, v.users_id, v.vendor_phone, v.business_name, v.vendor_email, v.vendor_type,
                  v.certificate_expiration, v.certificate_number, v.products_sold, GROUP_CONCAT(m.id) market_ids,
                  GROUP_CONCAT(m.market_name) market_names FROM vendors v LEFT JOIN markets_vendors mv ON mv.vendors_id = v.id
                  LEFT JOIN markets m ON mv.markets_id = m.id WHERE v.users_id = $user_id GROUP BY v.id ";
$q_vendor = $db->query($q_vendor);

//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 4;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;

$timezone = date_default_timezone_get('Pacific');
$date = date("Y-m-d");



?>
<style>
.modal-content {
  padding: 10px;

}

.table {
  word-wrap:break-word !important;
}
</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-97558181-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-97558181-2');
</script>



<!--Main container start-->
<div class="row">

  <div class="col-md-12">
<div id="page-wrapper">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
    <div class="row">
        <div class="col-md-6">
            <h1>Markets</h1>
        </div>
        <div class="col-lg-6" style="">
            <div class="page-action-links text-right">
	            	<button class="btn btn-success" data-toggle="modal" data-target="#addnewmarket" ><span class="glyphicon glyphicon-plus"></span> Add New Market</button>
	            </a>
            </div>
        </div>
    </div>
    <!--  Market Search-->

    <hr>

    <div class="row">
    <?php
    foreach ($query as $row){
      $end_date = $row['end_date'];
      $is_closed = $end_date < $date
    ?>
      <div class="col-md-<?php echo $bootstrapColWidth; ?>">
        <div class="thumbnail" <?= $is_closed ? 'style="background-color: #C0C0C0;"' : ''?> >

          <center>
            <div class="logo"><img  src="img/<?php echo htmlspecialchars($row['img_url']) ?> "  alt="" title="" /></div>
            <h3><?php echo htmlspecialchars($row['market_name']); ?></h3>
            <div>Manager: <?php echo htmlspecialchars($row['manager_name']) ?> </div>
            <div>Phone #: <?php echo htmlspecialchars($row['phone']) ?> </div>
            <div>Notes: <?php echo htmlspecialchars($row['notes']) ?> </div>
            <div><i>Day: <?php echo htmlspecialchars($row['market_day']) ?></i> </div>
            <br>
            <a href='reports.php?market_id=<?php echo $row['public_id'] ?>'  class="btn btn-primary" style="margin-right: 8px;" ><span class="glyphicon glyphicon-list-alt" id="closed"></span></a>
            <br>
            <?=$is_closed ? '<div style="background-color: #E55D65; ">Closed for the Season! </div>' : ''?>
           </center>
           <br>
        </div>
      </div>

      <?php
        $rowCount++;
        if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
      }
      ?>
    </div>


                <!-- <?php
                $flat_fee = $row['flat_fee'];
                $percentage_fee = $row['percentage_fee'];

                if (isset($flat_fee) && isset($percentage_fee)) {
                  echo '$'.($flat_fee * 0.01).' '.$percentage_fee.'%';
                } else if (isset($flat_fee)) {
                  echo '$'.($flat_fee * 0.01);
                } else if (isset($percentage_fee)) {
                  echo $percentage_fee.'%';
                }
                ?> -->



<!--    Pagination links-->
    <div class="text-center">
    </div>
    <!--    Pagination links end-->

<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
    <table class="table table-striped table-bordered table-condensed" id="vendor_table">
        <thead>
          <tr>
              <th width="600">Market</th>
              <th width="500"> Currency</th>
          </tr>
        </thead>
      <tbody id="vendor_results">
          <?php foreach ($q1 as $row) : ?>
              <tr>
                <td ><?php echo htmlspecialchars($row['market_name']) ?></td>
                <td ><?php echo htmlspecialchars($row['market_currency_name']) ?></td>
</tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  </div>
  <div class="col-md-1">
  </div>
</div>

<div class="well text-center filter-form">
    <input class="form-control" id="myInput" type="text" placeholder="Search..">
</div>

<div class="row">
  <table class="table table-striped table-bordered table-condensed" id="vendor_table">
      <thead>
        <tr>
            <th width="600">Name</th>
            <th width="500">Business Name</th>
            <th width="80">Vendor Type</th>
            <th width="110"> Email </th>
            <th width="250">phone</th>
            <th width="220"> Certificate # (if applicable) </th>
            <th width="210"> Products Sold (if applicable) </th>
            <th width="150"> Markets</th>
            <th width="100"> Actions</th>
        </tr>
      </thead>
    <tbody id="vendor_results">
        <?php foreach ($q_vendor as $row) : ?>
            <tr>
              <td ><?php echo htmlspecialchars($row['vendor_name']) ?></td>
              <td ><?php echo htmlspecialchars($row['business_name']) ?></td>
              <td><?php echo htmlspecialchars($row['vendor_type']) ?></td>
              <td><a href="mailto:<?php echo htmlspecialchars($row['vendor_email']) ?>"><?php echo htmlspecialchars($row['vendor_email']) ?></a></td>
              <td><?php echo htmlspecialchars($row['vendor_phone']) ?> </td>
              <td><span style="font-weight:bold">#</span> <span style="color: grey;"><?php echo htmlspecialchars($row['certificate_number'])?></span>
                <span style="font-weight:bold">Exp</span><span style="color: grey;"> <?php echo htmlspecialchars($row['certificate_expiration']) ?></span> </td>
              <td><?php echo htmlspecialchars($row['products_sold']) ?> </td>
              <td><?=array_key_exists('market_names',$row)?$row['market_names']:'Not Associated With Market'?> </td>

              <td style='white-space: nowrap'>
                <a href='checkout.php?<?=$row["id"]?>'  class="btn btn-primary" style="margin-right: 8px;"><span class="glyphicon glyphicon-edit"></span>
                <a href='#' id="<?=$row["id"]?>"  class="btn btn-danger delete" style="margin-right: 8px;"><span class="glyphicon glyphicon-trash"></span></td>
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
</div>
</div>
<div class="cold-md-1">
</div>
</div>
</div>

<br><br><br><br>
</div>
<!--Main container end-->
<script>


$(document).ready(function(){
	$("#newmarketform").submit(function(event){
		submitForm();
		return false;
	});

  $(':text').keyup(function() {
      if($('#market_currency_name').val() != "" && $('#market_currency_value').val() != "") {
         $('#submit').removeAttr('disabled');
      } else {
         $('#submit').attr('disabled', true);
      }
  });

var currencies = [];
var maxRows = 5;
var x = 1;


$('#add_currency').click(function(e) {
  event.preventDefault()
  if (x <= maxRows) {
    currencies.push({
      name: $('#market_currency_name').val(),
      value: $('#market_currency_value').val(),
      dollarValue: $('#market_currency_dollar_value').val()
    });
    document.getElementById("currenices_added").innerHTML = JSON.stringify(currencies, null, 4);

    console.log(currencies);

    var htmlStr = '';

    currencies.forEach(function(currency) {
      var name = currency.name;
      var value = currency.value;
      var dollarValue = currency.dollarValue;

      htmlStr += `<li>${name} ${value} ${dollarValue}</li>`;
    });

    document.getElementById("currenices_added").innerHTML = htmlStr;

    x++;
  }
});



function submitForm(){

  let data = {
    market_name: $('#market_name').val(),
    market_phone: $('#market_phone').val(),
    market_city: $('#market_city').val(),
    public_id: $('#public_id').val(),
    manager_name: $('#manager_name').val(),
    certified: $('#certified').val(),
    certificate_number: $('#certificate_number').val(),
    cdfa_app_id: $('#cdfa_app_id').val(),
    start_date: $('#start_date').val(),
    market_hours: $('#market_hours').val(),
    flat_fee: $('#flat_fee').val(),
    percentage_fee: $('#percentage_fee').val(),
    custom_fee: $('#custom_fee').val(),
    notes: $('#notes').val(),
    img_upload: $('img_upload').val(),
    currencies: currencies

  };

  console.log(data)


	 $.ajax({
		type: "POST",
    contentType: "multipart/form-data",
		url: "https://arkitu.co/manager/forms/add_market_form.php",
		cache:false,
		data: data,
    beforeSend:function(){

     $('#add_market').val("Inserting");
    },
		success: function(response){
      $('#newmarketform')[0].reset();
      $('#addnewmarket').modal('hide');
      $('.modal-backdrop').remove();
      $("#market_table").load(window.location + " #market_table");
      $(this).removeData('#newmarketform');

		},
		error: function(){
			alert("Error");
		}
	});
}






    $('#editmarketform').submit(false);
    function submiteditForm(){
      event.preventDefault();
    // var info = element.attr("id");
    	 $.ajax({
    		type: "POST",
    		url: "./forms/edit_market_form.php",
    		cache:false,
    		data: $('#editmarketform').serialize(),
        beforeSend:function(){
         $('#edit_market').val("Inserting");
        },
    		success: function(response){
          console.log('test')
          $('#editmarketform')[0].reset();
          $('#editmarket').modal('hide');
          $('.modal-backdrop').remove();
          $("#market_table").load(window.location + " #market_table");
          $(this).removeData('#editmarketform');


    		},
    		error: function(){
    			alert("Error");
    		}

    	});
    }

    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Are you sure you want to delete this?"))
    {
     $.ajax({
       type: "POST",
       url: "forms/delete_market.php",
       data: info,
       success: function(response){
         $("#market_table").load(window.location + " #market_table");
         //$('.delete').trigger('reset');
     },
    });
      $(this).parents(".show").animate({ backgroundColor: "blue" }, "slow")
      .animate({ opacity: "hide" }, "slow");
     }
    return false;
    });
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
 if ($('.myselect-service-package').length > 0) {
     $('.myselect-service-package').select2();
   };

   if ($('.myselect').length > 0) {
     $('.myselect').select2();
   };
 </script>

 <?php } else { header('location: sign-in.php '); }; ?>

<?php include_once './includes/footer.php'; ?>
